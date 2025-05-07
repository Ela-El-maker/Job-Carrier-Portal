<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Candidate;
use App\Models\ClientReview;
use App\Models\Company;
use App\Models\Country;
use App\Models\CustomPageBuilder;
use App\Models\CustomSection;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Plan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //
    function index(): View
    {
        $plans = Plan::where(['frontend_show' => 1, 'show_at_home' => 1])->get();
        $heroes = Hero::where('show_at_home', 1)->inRandomOrder()->limit(3)->get();
        $countries = Country::all();
        $jobCount = Job::count(); // Get the total count of jobs
        $jobCategories = JobCategory::all();
        $popularJobCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])->where('deadline', '>=', now());
        }])->where('show_at_popular', 1)->inRandomOrder()->limit(8)->get();

        $featuredCategories = JobCategory::withCount(['jobs' => function ($query) {
            $query->where(['status' => 'active'])->where('deadline', '>=', now());
        }])->where('show_at_featured', 1)
            ->orderByDesc('jobs_count')
            ->take(8)
            ->get();


        // $popularCompanies = Company::query()
        //     ->select('companies.*')
        //     ->join('jobs', 'jobs.company_id', '=', 'companies.id')
        //     ->join('applied_jobs', 'applied_jobs.job_id', '=', 'jobs.id')
        //     ->where('jobs.status', 'active')
        //     ->where('jobs.deadline', '>=', now())
        //     ->groupBy('companies.id')
        //     ->orderByRaw('COUNT(applied_jobs.id) DESC')
        //     ->take(10)
        //     ->get();
        // $popularCompanies = Company::query()
        //     ->select('companies.*')
        //     ->join('jobs', 'jobs.company_id', '=', 'companies.id')
        //     ->join('applied_jobs', 'applied_jobs.job_id', '=', 'jobs.id')
        //     ->where('jobs.status', 'active')
        //     ->where('jobs.deadline', '>=', now())
        //     ->groupBy('companies.id')
        //     ->havingRaw('COUNT(applied_jobs.id) > 2')  // Filter companies with more than 10 applications
        //     ->orderByRaw('COUNT(applied_jobs.id) DESC')
        //     ->take(10)
        //     ->get();

        $popularCompanies = Company::query()
            ->select('companies.*')
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('applied_jobs', 'applied_jobs.job_id', '=', 'jobs.id')
            ->where('jobs.status', 'active')
            ->where('jobs.deadline', '>=', now())
            ->groupBy('companies.id')
            ->havingRaw('COUNT(DISTINCT jobs.id) > 10')  // Filter companies with more than 15 active jobs
            ->havingRaw('COUNT(applied_jobs.id) > 10')   // Filter companies with more than 15 applications
            ->orderByRaw('COUNT(applied_jobs.id) DESC')
            ->take(10)
            ->get();


        $topJobs = Job::withCount('applications')  // Count applications for each job
            ->with('company')  // Load the company associated with the job
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->having('applications_count', '>', 10)  // Filter jobs with more than 15 applications
            ->orderBy('applications_count', 'desc')  // Order by the number of applications in descending order
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take(5)  // Limit to the top 5 jobs
            ->get();

        $goldenJobs = Job::with('company')
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->where('is_golden', 1) // Assuming you have a 'is_golden' column to determine golden jobs
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take(1)
            ->get();

        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $blogTitle = BlogSectionSetting::first();
        $customSection = CustomSection::first();

        $totalCandidates = Candidate::where(['profile_complete' => 1, 'visibility' => 1])->count();
        $totalCompanies = Company::where('profile_completion', 1)->where('visibility', 1)->count();
        $totalMembers = $totalCandidates + $totalCompanies;

        $totalApplications = AppliedJob::count();
        $totalJobs = Job::where('deadline', '>=', date('Y-m-d'))->where('status', 'active')->count();

        $reviews = ClientReview::where('is_approved', 1)->get();
        return view(
            'frontend.home.index',
            compact(
                'plans',
                'heroes',
                'countries',
                'jobCount',
                'jobCategories',
                'popularJobCategories',
                'featuredCategories',
                'popularCompanies',
                'topJobs',
                'goldenJobs',
                'blogs',
                'blogTitle',
                'customSection',
                'totalJobs',
                'totalJobs',
                'totalMembers',
                'totalCompanies',
                'totalApplications',
                'reviews'
            )
        );
    }


    public function customPage(string $slug)
    {
        try {
            $page = CustomPageBuilder::where(['slug' => $slug, 'status' => 'published', 'show' => 1])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Handle the error (e.g., show a custom 404 page)
            abort(404, 'Page not found');
        }


        return view('frontend.pages.custom-page', compact('page'));
    }
}
