<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendJobPageController extends Controller
{
    //
    public function index(): View
    {
        // Fetch active jobs with a deadline in the future
        $jobs = Job::where('status', 'active')
            ->where('deadline', '>=', date('Y-m-d')) // Deadline is in the future
            ->paginate(20);

        return view('frontend.pages.jobs-index', compact('jobs'));
    }

    function show(string $slug): View
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $openJobs = Job::where('company_id', $job->company->id)
            ->where('deadline', '>=', date('Y-m-d'))
            ->where('status', 'active')
            ->count();

        // Fetch similar jobs (same category and active with future deadlines)
        $similarJobs = Job::where('job_category_id', $job->job_category_id)
            ->where('id', '!=', $job->id)
            ->where('status', 'active') // Only fetch active jobs
            ->where('deadline', '>=', now()) // Ensure the deadline is in the future
            ->limit(5)
            ->get();

        return view('frontend.pages.job-show', compact('job', 'openJobs','similarJobs'));
    }
}
