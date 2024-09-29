<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyFoundingInfoUpdateRequest;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryType;
use App\Models\OrganizationType;
use App\Models\State;
use App\Models\TeamSize;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


class CompanyProfileController extends Controller
{
    //
    use FileUploadTrait;


    function index(): View
    {
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();

        // Use null-safe access for country and state properties
        $industryTypes = IndustryType::all();
        $organizationTypes = OrganizationType::all();
        $teamSizes = TeamSize::all();
        $countries = Country::all();
        $states = State::select(['id', 'name', 'country_id'])->where('country_id', $companyInfo?->country)->get();
        $cities = City::select(['id', 'name', 'state_id', 'country_id'])->where('state_id', $companyInfo?->state)->get();


        return view(
            'frontend.company-dashboard.profile.index',
            compact(
                'companyInfo',
                'industryTypes',
                'organizationTypes',
                'teamSizes',
                'countries',
                'states',
                'cities'
            )
        );
    }




    function updateCompanyInfo(CompanyInfoUpdateRequest $request)
    {
        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if (!empty($logoPath)) $data['logo'] = $logoPath;
        if (!empty($bannerPath)) $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        // Update or create the company profile
        $companyProfile = Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        // Calculate profile completion percentage
        $profileCompletionPercentage = getCompanyProfileCompletion();

        // Update the profile completion status
        $companyProfile->profile_completion = $profileCompletionPercentage;

        // Set visibility based on profile completion (100%)
        if ($profileCompletionPercentage == 100) {
            $companyProfile->visibility = 1;  // Profile is visible when 100% complete
        } else {
            $companyProfile->visibility = 0;  // Profile is hidden if not 100% complete
        }

        $companyProfile->save();

        // Notify the user of a successful update
        Notify::updatedNotification();

        return redirect()->back()->with('profileCompletion', $profileCompletionPercentage);
    }
    function updateFoundingInfo(CompanyFoundingInfoUpdateRequest $request): RedirectResponse
    {
        Company::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'industry_type_id' => $request->industry_type,
                'organization_type_id' => $request->organization_type,
                'team_size_id' => $request->team_size,
                'establishment_date' => $request->establishment_date,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'map_link' => $request->map_link,
            ]
        );
        // Calculate profile completion percentage
        $profileCompletion = getCompanyProfileCompletion(); // Assuming this function is available

        if ($profileCompletion == 100) {
            $companyProfile = Company::where('user_id', auth()->user()->id)->first();
            $companyProfile->profile_completion = 1; // Mark as complete
            $companyProfile->visibility = 1; // Make the profile visible
            $companyProfile->save();
        }

        Notify::updatedNotification();

        // Pass profile completion percentage to the view
        return redirect()->back()->with('profileCompletion', $profileCompletion);
    }

    function updateAccountInfo(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email'],
        ]);

        Auth::user()->update($validatedData);

        // Calculate profile completion percentage
        $profileCompletion = getCompanyProfileCompletion(); // Assuming this function is available

        if ($profileCompletion == 100) {
            $companyProfile = Company::where('user_id', auth()->user()->id)->first();
            $companyProfile->profile_completion = 1; // Mark as complete
            $companyProfile->visibility = 1; // Make the profile visible
            $companyProfile->save();
        }

        Notify::updatedNotification();

        // Pass profile completion percentage to the view
        return redirect()->back()->with('profileCompletion', $profileCompletion);
    }

    function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        Auth::user()->update(['password' => bcrypt($request->password)]);

        Notify::updatedNotification();

        return redirect()->back();
    }
}
