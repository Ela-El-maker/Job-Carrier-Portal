<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCompanyPageController extends Controller
{
    //

    function index(): View
    {
        // Fetch companies with profile_completion = 1 and visibility = 1
        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])
    ->get()
    ->groupBy(function ($company) {
        return strtoupper(substr($company->name, 0, 1)); // Group by first letter
    });


        return view('frontend.pages.company-index', compact('companies'));
    }


    function show(string $slug): View
    {
        $company = Company::where(['profile_completion' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();
        return view('frontend.pages.company-details', compact('company'));
    }
}
