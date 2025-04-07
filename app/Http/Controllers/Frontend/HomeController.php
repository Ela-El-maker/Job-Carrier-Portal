<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\Company;
use App\Models\Country;
use App\Models\Hero;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Plan;
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


        $popularCompanies = Company::query()
            ->select('companies.*')
            ->join('jobs', 'jobs.company_id', '=', 'companies.id')
            ->join('applied_jobs', 'applied_jobs.job_id', '=', 'jobs.id')
            ->where('jobs.status', 'active')
            ->where('jobs.deadline', '>=', now())
            ->groupBy('companies.id')
            ->orderByRaw('COUNT(applied_jobs.id) DESC')
            ->take(10)
            ->get();

        $topJobs = Job::with('company')
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            // ->orderBy('views', 'desc') // Assuming you have a 'views' column to determine popularity
            ->take(5)
            ->get();

        $goldenJobs = Job::with('company')
            ->where('status', 'active')
            ->where('deadline', '>=', now())
            ->where('is_golden', 1) // Assuming you have a 'is_golden' column to determine golden jobs
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->take(1)
            ->get();

        $blogs = Blog::where('status', 1)->latest()->take(5)->get();
        $blogTitle = BlogSectionSetting::first();


        return view('frontend.home.index', compact('plans', 'heroes', 'countries', 'jobCount', 'jobCategories', 'popularJobCategories', 'featuredCategories', 'popularCompanies', 'topJobs', 'goldenJobs', 'blogs', 'blogTitle'));
    }
}
