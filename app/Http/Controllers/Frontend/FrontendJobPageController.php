<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\State;
use App\Services\ViewTracker;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class FrontendJobPageController extends Controller
{
    //
    public function index(Request $request): View
    {

        $countries = Country::all();
        $states = Country::where('id', 1)->exists() ? Country::find(1)->states : collect(); // Ensure ID 1 exists

        $jobCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where('status', 'active') // Only fetch active jobs
                ->where('deadline', '>=', now()); // Deadline is in the future
        }])->get();

        $jobTypes = JobType::all();
        $selectedStates = null;
        $selectedCities = null;
        $query = Job::query();
        $query->where('status', 'active')->where('deadline', '>=', now());

        //applying the seach filter
        if ($request->has('search') && $request->filled('search')) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        }
        if ($request->has('country') && $request->filled('country')) {
            $query->where('country_id', $request->country);
            $selectedStates = State::where('country_id', $request->country)->get();
        }
        if ($request->has('state') && $request->filled('state')) {
            $query->where('state_id', $request->state);
            $selectedStates = City::where('state_id', $request->state)->get();
        }

        if ($request->has('city') && $request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        // if ($request->has('category') && $request->filled('category')) {
        //     $categoryIds = JobCategory::whereIn('slug', $request->category)->pluck('id')->toArray();
        //     $query->whereIn('job_category_id', $categoryIds);
        // }

        if ($request->has('category') && $request->filled('category')) {
            $categorySlugs = is_array($request->category) ? $request->category : [$request->category];

            $categoryIds = JobCategory::whereIn('slug', $categorySlugs)->pluck('id')->toArray();
            $query->whereIn('job_category_id', $categoryIds);

            $query->orWhereHas('category', function ($query) use ($categorySlugs) {
                $query->whereIn('slug', $categorySlugs);
            });
        }


        // Salary filter
        if ($request->has('min_salary') && $request->filled('min_salary') && $request->min_salary > 0) {
            $query->where(function ($q) use ($request) {
                $q->where('min_salary', '>=', $request->min_salary)
                    ->orWhere('max_salary', '>=', $request->min_salary);
            });
        }


        // if ($request->has('jobtype') && $request->filled('jobtype')) {
        //     $query->whereIn('job_type_id', JobType::whereIn('slug', $request->jobtype)->pluck('id'));
        // }

        if ($request->has('jobtype') && $request->filled('jobtype')) {
            $jobTypeSlugs = is_array($request->jobtype) ? $request->jobtype : [$request->jobtype];

            $jobTypeIds = JobType::whereIn('slug', $jobTypeSlugs)->pluck('id')->toArray();
            $query->whereIn('job_type_id', $jobTypeIds);

            $query->orWhereHas('jobType', function ($query) use ($jobTypeSlugs) {
                $query->whereIn('slug', $jobTypeSlugs);
            });
        }

        // Get top 3 job categories by job count
        $popularCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where('status', 'active')
                ->where('deadline', '>=', now());
        }])
            ->orderBy('jobs_count', 'desc') // Sort by job count (most popular)
            ->limit(3) // Get only the top 3 categories
            ->get();

        // Get top 2 job types by job count
        $popularJobTypes = JobType::withCount('jobs')
            ->orderBy('jobs_count', 'desc') // Sort by job count
            ->limit(2) // Get only the top 2 job types
            ->get();

        // Eager load relationships
        $query->with(['country', 'state', 'city', 'category', 'jobType']);

        $jobs = $query->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(7);


        return view('frontend.pages.jobs-index', compact('jobs', 'countries', 'selectedStates', 'selectedCities', 'jobCategories', 'jobTypes', 'popularCategories', 'popularJobTypes'));
    }


    //     function show(string $slug): View
    //     {
    //         $candidate = Candidate::where('user_id', auth()->id())->first();
    //         $job = Job::where('slug', $slug)->firstOrFail();
    //         $openJobs = Job::where('company_id', $job->company->id)
    //             ->where('deadline', '>=', date('Y-m-d'))
    //             ->where('status', 'active')
    //             ->count();
    //         $alreadyAppliedJob = AppliedJob::where(['job_id' => $job?->id, 'user_id' => auth()->user()?->id])->exists();
    // // dd($alreadyAppliedJob);Candidate::where('user_id', auth()->id())->first();
    //         // Fetch similar jobs (same category and active with future deadlines)
    //         $similarJobs = Job::where('job_category_id', $job->job_category_id)
    //             ->where('id', '!=', $job->id)
    //             ->where('status', 'active') // Only fetch active jobs
    //             ->where('deadline', '>=', now()) // Ensure the deadline is in the future
    //             ->limit(5)
    //             ->get();

    //         return view('frontend.pages.job-show', compact('job', 'openJobs', 'similarJobs', 'alreadyAppliedJob'));
    //     }

    function show(string $slug, Request $request): View
    {
        $job = Job::where('slug', $slug)->firstOrFail();

        $openJobs = Job::where('company_id', $job->company->id)
            ->where('deadline', '>=', date('Y-m-d'))
            ->where('status', 'active')
            ->count();

        $candidate = Candidate::where('user_id', auth()->id())->first();
        $alreadyAppliedJob = false;

        if ($candidate) {
            $alreadyAppliedJob = AppliedJob::where([
                'job_id' => $job->id,
                'candidate_id' => $candidate->id,
            ])->exists();
        }

        $similarJobs = Job::where('job_category_id', $job->job_category_id)
            ->where('id', '!=', $job->id)
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->limit(5)
            ->get();

        app(ViewTracker::class)->track($job, $request);
        return view('frontend.pages.job-show', compact(
            'job',
            'openJobs',
            'similarJobs',
            'alreadyAppliedJob'
        ));
    }

    // function applyJob(string $id)
    // {
    //     if (!auth()->check()) {
    //         throw ValidationException::withMessages(['Please login to apply for this job']);
    //     }

    //     $alreadyAppliedJob = AppliedJob::where(['job_id' => $id, 'candidate_id' => auth()->user()->id])->exists();
    //     if ($alreadyAppliedJob) {
    //         throw ValidationException::withMessages(['You have already applied for this job']);
    //     }
    //     $applyJob = new AppliedJob();
    //     $applyJob->job_id = $id;
    //     $applyJob->candidate_id = auth()->user()->id;
    //     $applyJob->save();

    //     // Return a success response
    //     return response(
    //         ['message' => 'Job application submitted successfully.'],
    //         200
    //     );
    // }


    function applyJob(string $id)
    {
        if (!auth()->check()) {
            throw ValidationException::withMessages(['Please login to apply for this job']);
        }

        if (auth()->user()->role !== 'candidate') {
            throw ValidationException::withMessages(['Only candidates can apply for jobs']);
        }

        $candidate = Candidate::where('user_id', auth()->id())->first();

        if (!$candidate) {
            throw ValidationException::withMessages(['Candidate profile not found.']);
        }

        $alreadyAppliedJob = AppliedJob::where([
            'job_id' => $id,
            'candidate_id' => $candidate->id
        ])->exists();

        if ($alreadyAppliedJob) {
            throw ValidationException::withMessages(['You have already applied for this job']);
        }

        $applyJob = new AppliedJob();
        $applyJob->job_id = $id;
        $applyJob->candidate_id = $candidate->id;
        $applyJob->save();

        return response(
            ['message' => 'Job application submitted successfully.'],
            200
        );
    }


    //     function applyJob(string $id)
    //     {
    //         // 1. Check if user is authenticated
    //         if (!auth()->check()) {
    //             throw ValidationException::withMessages(['Please login to apply for this job']);
    //         }

    //         // 2. Verify the user is a candidate
    //         if (auth()->user()->role !== 'candidate') { // Adjust based on your role system
    //             throw ValidationException::withMessages(['Only candidates can apply for jobs']);
    //         }

    //         // 3. Check for duplicate applications
    //         $alreadyAppliedJob = AppliedJob::where([
    //             'job_id' => $id,
    //             'candidate_id' => auth()->user()->id
    //         ])->exists();
    // // dd($alreadyAppliedJob);
    //         if ($alreadyAppliedJob) {
    //             throw ValidationException::withMessages(['You have already applied for this job']);
    //         }

    //         // 4. Create the application
    //         $applyJob = new AppliedJob();
    //         $applyJob->job_id = $id;
    //         $applyJob->candidate_id = auth()->user()->id;
    //         $applyJob->save();

    //         return response(
    //             ['message' => 'Job application submitted successfully.'],
    //             200
    //         );
    //     }
}
