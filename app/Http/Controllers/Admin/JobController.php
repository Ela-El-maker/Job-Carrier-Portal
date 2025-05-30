<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobCreateRequest;
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
use Illuminate\Http\Response;
use Illuminate\View\View;

class JobController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:job create|job update|job delete'])->only(['index']);
        $this->middleware(['permission:job create'])->only(['create', 'store']);
        $this->middleware(['permission:job update'])->only(['edit', 'update','changeStatus']);
        $this->middleware(['permission:job delete'])->only(['destroy']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $query = Job::query();

        $this->search($query, ['title', 'slug', 'status']);

        $jobs = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $salaryTypes  = SalaryType::all();
        $experiences = JobExperience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('admin.job.create', compact('companies', 'categories', 'countries', 'salaryTypes', 'experiences', 'jobRoles', 'educations', 'jobTypes', 'tags', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCreateRequest $request)
    {
        //
        // dd($request->all());
        // $job = new Job();
        $job = new Job();
        $job->title = $request->title;
        $job->company_id = $request->company;
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
        // $job->custom_salary = $request->custom_salary;
        $job->custom_salary = $request->salary_mode === 'custom' ? $request->custom_salary : 'Not Applicable';
        $job->salary_type_id = $request->salary_type;

        $job->job_experience_id = $request->experience;
        $job->job_role_id = $request->job_role;
        $job->education_id = $request->education;
        $job->job_type_id = $request->job_type;

        //Tags, Benefits,Skills will be handled separately

        // $job->apply_on = $request->receive_applications;
        $job->is_featured = $request->featured ?? 0;
        $job->is_highlighted = $request->highlight ?? 0;
        $job->is_golden = $request->golden_job ?? 0;

        $job->description = $request->description;
        $job->status = 'active';
        $job->save();



        $job->category->updatePopularStatus();

        $job->category->updateFeaturedStatus();

        // dd($oldCategoryId);

        // dd($job); // Uncomment this line to debug if needed
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




        Notify::createdNotification();
        return to_route('admin.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $job = Job::findOrFail($id);
        return view('admin.job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $job = Job::findOrFail($id);
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        $categories = JobCategory::all();
        $countries = Country::all();
        $states = State::where('country_id', $job?->country_id)->get();
        $cities = City::where('state_id', $job?->state_id)->get();
        $salaryTypes  = SalaryType::all();
        $experiences = JobExperience::all();
        $jobRoles = JobRole::all();
        $educations = Education::all();
        $jobTypes = JobType::all();
        $tags = Tag::all();
        $skills = Skill::all();
        return view('admin.job.edit', compact('companies', 'categories', 'countries', 'states', 'cities', 'salaryTypes', 'experiences', 'jobRoles', 'educations', 'jobTypes', 'tags', 'skills', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobCreateRequest $request, string $id)
    {
        //
        // dd($request->all());
        $job = Job::findOrFail($id);
        $job->title = $request->title;
        $job->company_id = $request->company;
        // $job->job_category_id = $request->category;
        $oldCategoryId = $job->job_category_id;
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

        //Tags, Benefits,Skills will be handled separately

        // $job->apply_on = $request->receive_applications;
        $job->is_featured = $request->featured ?? 0;
        $job->is_highlighted = $request->highlight ?? 0;
        $job->is_golden = $request->golden_job ?? 0;

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


        Notify::updatedNotification();
        return to_route('admin.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $job = Job::findOrFail($id);
            $categoryId = $job->job_category_id;
            $job->delete();

            JobCategory::find($categoryId)?->updatePopularStatus();
            JobCategory::find($categoryId)?->updateFeaturedStatus();

            Notify::deletedNotification();

            // If the request expects JSON (e.g. AJAX)
            if (request()->expectsJson()) {
                return response(['message' => 'success'], 200);
            }

            // Otherwise, assume it's a regular form request
            return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
        } catch (\Exception $e) {
            logger($e);

            if (request()->expectsJson()) {
                return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
            }

            return redirect()->route('admin.jobs.index')->with('error', 'Something went wrong. Please try again.');
        }
    }


    function changeStatus(string $id): Response
    {
        $job = Job::findOrFail($id);
        $job->status = $job->status == 'active' ? 'pending' : 'active';
        $job->save();
        Notify::updatedNotification();
        return response(['message' => 'success'], 200);
    }
}
