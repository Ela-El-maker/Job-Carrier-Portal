<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryType;
use App\Models\Job;
use App\Models\OrganizationType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCompanyPageController extends Controller
{
    //

    // function index(): View
    // {
    //     $countries = Country::all();
    //     $industryTypes = IndustryType::withCount('companies')->get();
    //     $organizations = OrganizationType::withCount('companies')->get();

    //     $selectedStates = null;
    //     $selectedCities = null;

    //     $query = Company::query();
    //     $query->withCount(['jobs' => function ($query) {
    //         $query->where('status', 'active')->where('deadline', '>=', now());
    //     }])->where(['profile_completion' => 1, 'visibility' => 1]);

    //     // Fetch companies with profile_completion = 1 and visibility = 1
    //     $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])
    //         ->get()
    //         ->groupBy(function ($company) {
    //             return strtoupper(substr($company->name, 0, 1)); // Group by first letter
    //         });

    //     $companies = $query->paginate(21);
    //     return view('frontend.pages.company-index', compact('companies', 'industryTypes'));
    // }

    function index(Request $request): View
    {
        $industryTypes = IndustryType::withCount('companies')->select('id', 'name', 'slug')->get();
        $organizations = OrganizationType::withCount('companies')->select('id', 'name', 'slug')->get();
        $countries = Country::select('id', 'name')->get();
        $selectedStates = null;
        $selectedCities = null;

        // Query for paginated companies with job counts
        $query = Company::query()
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'active')->where('deadline', '>=', now());
            }])
            ->where('profile_completion', 1)
            ->where('visibility', 1);

        // Apply search filter if provided
        if ($request->has('search') && $request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('country') && $request->filled('country')) {
            $query->where('country', $request->country);
            $selectedStates = State::where('country_id', $request->country)->select('id', 'name')->get();
        }

        if ($request->has('state') && $request->filled('state')) {
            $query->where('state', $request->state);
            $selectedCities = City::where('state_id', $request->state)->select('id', 'name')->get();
        }

        if ($request->has('city') && $request->filled('city')) {
            $query->where('city', $request->city);
        }

        if ($request->has('industry') && $request->filled('industry')) {
            $query->whereHas('industryType', function ($query) use ($request) {
                $query->where('slug', $request->industry);
            });
        }

        if ($request->has('organization') && $request->filled('organization')) {
            $query->whereHas('organizationType', function ($query) use ($request) {
                $query->where('slug', $request->organization);
            });
        }

        $paginatedCompanies = $query->paginate(21);

        // Only fetch companies for letter grouping when not filtering
        // This avoids loading all companies when we already have paginated results
        $companiesByLetter = collect();
        if (!$request->hasAny(['search', 'country', 'state', 'city', 'industry', 'organization'])) {
            $companiesByLetter = Company::where('profile_completion', 1)
                ->where('visibility', 1)
                ->select('id', 'name', 'slug')
                ->withCount(['jobs' => function ($query) {
                    $query->where('status', 'active')->where('deadline', '>=', now());
                }])
                ->get()
                ->groupBy(function ($company) {
                    return strtoupper(substr($company->name, 0, 1));
                });
        }

        return view('frontend.pages.company-index', compact(
            'paginatedCompanies',
            'companiesByLetter',
            'industryTypes',
            'countries',
            'organizations',
            'selectedStates',
            'selectedCities'
        ));
    }



    function show(string $slug): View
    {
        $company = Company::with([
            'companyCountry:id,name',
            'companyState:id,name', 
            'companyCity:id,name',
            'industryType:id,name',
            'organizationType:id,name',
            'teamSize:id,name'
        ])->where(['profile_completion' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();

        // Fetch similar jobs for the same company (excluding the current job)
        $companySimilarJobs = Job::with(['jobType:id,name', 'category:id,name,slug'])
            ->where('company_id', $company->id)
            ->where('deadline', '>=', date('Y-m-d'))
            ->where('status', 'active')
            ->select('id', 'title', 'slug', 'company_id', 'job_type_id', 'job_category_id', 'min_salary', 'max_salary', 'deadline', 'created_at')
            ->paginate(5);
        return view('frontend.pages.company-details', compact('company', 'companySimilarJobs'));
    }
}
