<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCreateRequest;
use App\Models\AppliedJob;
use App\Models\Benefits;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Education;
use App\Models\Job;
use App\Models\JobBenefits;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobRole;
use App\Models\JobSkills;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Models\State;
use App\Models\Tag;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class JobController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */


    public function index(): View|RedirectResponse
    {
        storePlanInformation();

        $company = auth()->user()?->company;

        // Ensure company profile is complete and visible
        if (!$company || !$company->profile_completion || !$company->visibility) {
            return redirect()->route('company.profile')
                ->with('error', 'Please complete and publish your company profile to access your job posts.');
        }

        $query = Job::query()->withCount('applications');

        $this->search($query, ['title', 'slug', 'deadline', 'status', 'created_at', 'updated_at']);

        $jobs = $query->where('company_id', $company->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('frontend.company-dashboard.jobs.index', compact('jobs'));
    }

    function applications(string $id): View
    {

        $query = AppliedJob::where('job_id', $id);
        $this->search($query, ['full_name', 'deadline', 'status', 'birth_date']);
        $applications = $query->paginate(15);
        $jobTitle = Job::select('title')->where('id', $id)->first();
        return view(
            'frontend.company-dashboard.applications.index',
            compact('applications', 'jobTitle')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        // Fetch all required data
        storePlanInformation();
        $userPlan = session('user_plan');

        // Check if userPlan exists and is an array
        if (!isset($userPlan['job_limit']) || $userPlan['job_limit'] < 1) {
            Notify::errorNotification('You have reached your job plan limit. Please upgrade your plan to post more jobs.');
            return to_route('company.jobs.index')->with('error', 'Unable to retrieve your plan information. Please try again.');
        }
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $salaryTypes = SalaryType::all();
        $experiences = JobExperience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();

        // Set default country and state IDs (e.g., first country and state)
        $defaultCountryId = $countries->first()?->id ?? null;
        $defaultStateId = State::where('country_id', $defaultCountryId)->first()?->id ?? null;

        // Fetch states and cities based on default IDs
        $states = State::where('country_id', $defaultCountryId)->get();
        $cities = City::where('state_id', $defaultStateId)->get();

        return view('frontend.company-dashboard.jobs.create', compact(
            'companies',
            'categories',
            'countries',
            'states',
            'cities',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'skills'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request)
    {
        //
        // dd($request->all());
        // $job = new Job();
        // 1. Verify company exists
        $company = auth()->user()->company;
        if (!$company) {
            throw ValidationException::withMessages(['You need to create a company profile first']);
        }

        // 2. Get current plan
        $userPlan = $company->userPlan;

        // 3. Check BASE job limit (always required)
        if ($userPlan->job_limit < 1) {
            Notify::errorNotification('Regular job posting limit reached. Please upgrade.');
            return back()->with('error', 'Job limit reached');
        }

        // 4. Check OPTIONAL features ONLY if they're selected
        if ($request->has('featured') && $userPlan->featured_job_limit < 1) {
            Notify::errorNotification('Featured job limit reached. Please upgrade.');
            return back()->with('error', 'Featured job limit reached');
        }

        if ($request->has('highlight') && $userPlan->highlight_job_limit < 1) {
            Notify::errorNotification('Highlighted job limit reached. Please upgrade.');
            return back()->with('error', 'Highlighted job limit reached');
        }

        if ($request->has('golden_job') && $userPlan->golden_job < 1) {
            Notify::errorNotification('Golden job limit reached. Please upgrade.');
            return back()->with('error', 'Golden job limit reached');
        }

        $job = new Job();
        $job->title = $request->title;
        $job->company_id = $company->id;
        $job->job_category_id = $request->category;
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;
        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;
        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;
        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;

        // Set featured, highlighted, and golden job statuses
        $job->is_featured = $request->featured ?? 0;
        $job->is_highlighted = $request->highlight ?? 0;
        $job->is_golden = $request->golden_job ?? 0;
        $job->description = $request->description;

        // dd($job->is_featured, $job->is_highlighted, $job->is_golden);
        // Save the job
        $job->save();

        // $category = JobCategory::withCount('jobs')->find($job->job_category_id);

        // if ($category->jobs_count >= 3 && !$category->show_at_popular) {
        //     $category->show_at_popular = true;
        //     $category->save();
        // }
        $job->category->updatePopularStatus();

        $job->category->updateFeaturedStatus();


        // Insert Tags
        foreach ($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        // Insert Benefits

        $benefits = explode(',', $request->benefits);
        foreach ($benefits as $benefit) {
            $createBenefit = new Benefits();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();

            //store job benfit
            $jobBenefit = new JobBenefits();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }

        // Insert Skills
        foreach ($request->skills as $skill) {
            $createSkill = new JobSkills();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }



        // 6. Decrement ONLY used features
        $userPlan->decrement('job_limit');
        if ($job->is_featured) $userPlan->decrement('featured_job_limit');
        if ($job->is_highlighted) $userPlan->decrement('highlight_job_limit');
        if ($job->is_golden) $userPlan->decrement('golden_job');
        storePlanInformation();




        Notify::createdNotification();
        return to_route('company.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $job = Job::findOrFail($id);

        // Ensure only the owner company can view this job
        if ($job->company_id !== auth()->user()->company?->id) {
            abort(403, 'Unauthorized access to this job.');
        }

        // (Optional) You may want to show related jobs too – adjust if needed
        $similarJobs = Job::where('job_category_id', $job->job_category_id)
            ->where('id', '!=', $job?->id)
            ->where('company_id', auth()->user()->company?->id) // ensure only their own jobs
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->limit(5)
            ->get();

        return view('frontend.company-dashboard.jobs.show', compact('job', 'similarJobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $job = Job::findOrFail($id);

        // Ensure the authenticated user's company owns the job
        abort_if($job->company_id !== auth()->user()->company?->id, 403, 'You are not authorized to edit this job.');

        // Fetch necessary data for the form
        $categories = JobCategory::all();
        $countries = Country::all();
        $states = $job->country_id ? State::where('country_id', $job->country_id)->get() : collect();
        $cities = $job->state_id ? City::where('state_id', $job->state_id)->get() : collect();
        $salaryTypes = SalaryType::all();
        $experiences = JobExperience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();

        // Return the view with the data
        return view('frontend.company-dashboard.jobs.edit', compact(
            'categories',
            'countries',
            'states',
            'cities',
            'salaryTypes',
            'experiences',
            'jobRoles',
            'educations',
            'jobTypes',
            'tags',
            'skills',
            'job'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobCreateRequest $request, string $id)
    {
        $job = Job::findOrFail($id);

        $company = auth()->user()->company;
        if (!$company) {
            throw ValidationException::withMessages(['You need to create a company profile first']);
        }

        $userPlan = $company->userPlan;

        // Get current and new values for premium features
        $wasFeatured = $job->is_featured;
        $wasHighlighted = $job->is_highlighted;
        $wasGolden = $job->is_golden;

        $newFeatured = $request->featured ?? 0;
        $newHighlighted = $request->highlight ?? 0;
        $newGolden = $request->golden_job ?? 0;

        // // Check for upgrades to premium features
        // if (!$wasFeatured && $newFeatured && $userPlan->featured_job_limit < 1) {
        //     Notify::errorNotification('Featured job limit reached. Please upgrade.');
        //     return back()->with('error', 'Featured job limit reached');
        // }

        // Adjust plan limits with proper checks
        if ($wasFeatured && !$newFeatured) {
            $userPlan->increment('featured_job_limit');
        } elseif (!$wasFeatured && $newFeatured) {
            if ($userPlan->featured_job_limit < 1) {
                Notify::errorNotification('Featured job limit reached. Please upgrade.');
                return back()->with('error', 'Featured job limit reached');
            }
            $userPlan->decrement('featured_job_limit');
        }

        // Repeat similar checks for other premium features

        // if (!$wasHighlighted && $newHighlighted && $userPlan->highlight_job_limit < 1) {
        //     Notify::errorNotification('Highlighted job limit reached. Please upgrade.');
        //     return back()->with('error', 'Highlighted job limit reached');
        // }

        if ($wasHighlighted && !$newHighlighted) {
            $userPlan->increment('highlight_job_limit');
        } elseif (!$wasHighlighted && $newHighlighted) {
            if ($userPlan->highlight_job_limit < 1) {
                Notify::errorNotification('Highlight job limit reached. Please upgrade.');
                return back()->with('error', 'Highlight job limit reached');
            }
            $userPlan->decrement('highlight_job_limit');
        }

        // if (!$wasGolden && $newGolden && $userPlan->golden_job < 1) {
        //     Notify::errorNotification('Golden job limit reached. Please upgrade.');
        //     return back()->with('error', 'Golden job limit reached');
        // }

        if ($wasGolden && !$newGolden) {
            $userPlan->increment('golden_job');
        } elseif (!$wasGolden && $newGolden) {
            if ($userPlan->golden_job < 1) {
                Notify::errorNotification('Golden job limit reached. Please upgrade.');
                return back()->with('error', 'Golden job limit reached');
            }
            $userPlan->decrement('golden_job');
        }

        $job->title = $request->title;
        // $job->job_category_id = $request->category;
        $oldCategoryId = $job->job_category_id; // ✅ Save current value BEFORE change

        $job->job_category_id = $request->category; // ✅ Now we override it
        $job->vacancies = $request->vacancies;
        $job->deadline = $request->deadline;

        $job->country_id = $request->country;
        $job->state_id = $request->state;
        $job->city_id = $request->city;
        $job->address = $request->address;


        $job->salary_mode = $request->salary_mode;
        $job->min_salary = $request->min_salary;
        $job->max_salary = $request->max_salary;
        $job->custom_salary = $request->custom_salary;
        $job->salary_type_id = $request->salary_type;

        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;

        //Tags, Benefits,Skills will be handled separately

        // $job->apply_on = $request->receive_applications;
        $job->is_featured = $newFeatured;
        $job->is_highlighted = $newHighlighted;
        $job->is_golden = $newGolden;
        $job->description = $request->description;
        $job->save();

        // Now, check if category changed:
        if ($oldCategoryId != $job->job_category_id) {
            JobCategory::find($oldCategoryId)?->updateFeaturedStatus();
            JobCategory::find($job->job_category_id)?->updateFeaturedStatus();

            JobCategory::find($oldCategoryId)?->updatePopularStatus();
            JobCategory::find($job->job_category_id)?->updatePopularStatus();
        } else {
            $job->category->updateFeaturedStatus();
            $job->category->updatePopularStatus();
        }




        // Insert Tags
        JobTag::where('job_id', $id)->delete();
        foreach ($request->tags as $tag) {
            $createTag = new JobTag();
            $createTag->job_id = $job->id;
            $createTag->tag_id = $tag;
            $createTag->save();
        }

        // Insert Benefits
        $selectedBenefits = JobBenefits::where('job_id', $id);
        foreach ($selectedBenefits->get() as $selectedBenefit) {
            Benefits::find($selectedBenefit?->benefit_id)->delete();
        }

        $selectedBenefits->delete();

        $benefits = explode(',', $request->benefits);

        foreach ($benefits as $benefit) {
            $createBenefit = new Benefits();
            $createBenefit->company_id = $job->company_id;
            $createBenefit->name = $benefit;
            $createBenefit->save();

            //store job benfit
            $jobBenefit = new JobBenefits();
            $jobBenefit->job_id = $job->id;
            $jobBenefit->benefit_id = $createBenefit->id;
            $jobBenefit->save();
        }
        // Insert Skills
        JobSkills::where('job_id', $id)->delete();
        foreach ($request->skills as $skill) {
            $createSkill = new JobSkills();
            $createSkill->job_id = $job->id;
            $createSkill->skill_id = $skill;
            $createSkill->save();
        }

        // Adjust plan limits
        if ($wasFeatured && !$newFeatured) {
            $userPlan->featured_job_limit += 1;
        } elseif (!$wasFeatured && $newFeatured) {
            $userPlan->featured_job_limit -= 1;
        }

        if ($wasHighlighted && !$newHighlighted) {
            $userPlan->highlight_job_limit += 1;
        } elseif (!$wasHighlighted && $newHighlighted) {
            $userPlan->highlight_job_limit -= 1;
        }

        if ($wasGolden && !$newGolden) {
            $userPlan->golden_job += 1;
        } elseif (!$wasGolden && $newGolden) {
            $userPlan->golden_job -= 1;
        }

        $userPlan->save();
        storePlanInformation();

        Notify::updatedNotification();
        return to_route('company.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // try {
        //     Job::findorfail($id)->delete();
        //     Notify::deletedNotification();
        //     return response(['message' => 'success'], 200);
        // } catch (\Exception $e) {
        //     logger($e);

        //     return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        // }

        try {
            $job = Job::findOrFail($id);

            $categoryId = $job->job_category_id;
            $job->delete();

            JobCategory::find($categoryId)?->updatePopularStatus();
            JobCategory::find($categoryId)?->updateFeaturedStatus();



            Notify::deletedNotification();

            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
