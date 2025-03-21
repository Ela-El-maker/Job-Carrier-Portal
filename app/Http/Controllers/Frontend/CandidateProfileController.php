<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CandidateAccountInfoUpdateRequest;
use App\Http\Requests\Frontend\CandidateBasicProfileUpdateRequest;
use App\Http\Requests\Frontend\CandidateProfileInfoUpdateRequest;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\State;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


// class CandidateProfileController extends Controller
// {
//     //
//     use FileUploadTrait;

//     function index(): View
//     {
//         $candidate = Candidate::with(['skills', 'languages'])->where('user_id', auth()->user()->id)->first();
//         $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
//         $candidateEducations = CandidateEducation::where('candidate_id', $candidate?->id)->orderBy('id', 'DESC')->get();
//         $experiences = Experience::all();
//         $professions = Profession::all();
//         $skills = Skill::all();
//         $languages = Language::all();
//         $countries = Country::all();
//         $states = State::select(['id', 'name', 'country_id'])->where('country_id', $candidate?->country)->get();
//         $cities = City::select(['id', 'name', 'state_id', 'country_id'])->where('state_id', $candidate?->state)->get();

//         return view(
//             'frontend.candidate-dashboard.profile.index',
//             compact(
//                 'candidate',
//                 'candidateExperiences',
//                 'candidateEducations',
//                 'experiences',
//                 'professions',
//                 'skills',
//                 'languages',
//                 'countries',
//                 'states',
//                 'cities'
//             )
//         );
//     }


//     /***
//      *
//      * Update basic info
//      *
//      */
//     function basicInfoUpdate(CandidateBasicProfileUpdateRequest $request): RedirectResponse
//     {

//         /***
//          * Handle files
//          */

//         $imagePath = $this->uploadFile($request, 'profile_picture');
//         $cvPath = $this->uploadFile($request, 'cv');

//         $data = [];
//         if (!empty($imagePath)) $data['image'] = $imagePath;
//         if (!empty($cvPath)) $data['cv'] = $cvPath;
//         $data['full_name'] = $request->full_name;
//         $data['title'] = $request->title;
//         $data['experience_id'] = $request->experience_level;
//         $data['website'] = $request->website;
//         $data['birth_date'] = $request->date_of_birth;


//         /***
//          * update data
//          */
//         // dd($request->all());
//         Candidate::updateOrCreate(
//             ['user_id' => auth()->user()->id],
//             $data
//         );
//         // Calculate profile completion percentage
//         $profileCompletion = getCandidateProfileCompletion(); // Assuming this function is available

//         // Update candidate profile completion and visibility based on percentage
//         $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
//         if ($candidateProfile) {
//             $candidateProfile->profile_complete = $profileCompletion == 100 ? 1 : 0; // Use 1 for complete, 0 for incomplete
//             $candidateProfile->visibility = $profileCompletion == 100 ? 1 : 0; // Set visibility based on completion
//             $candidateProfile->save(); // Save the updates
//         }

//         Notify::updatedNotification();

//         // Pass profile completion percentage to the view
//         return redirect()->back()->with('profileCompletion', $profileCompletion);
//     }


//     function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request): RedirectResponse
//     {

//         // dd($request->all());
//         $data = [];
//         $data['gender'] = $request->gender;
//         $data['marital_status'] = $request->marital_status;
//         $data['profession_id'] = $request->profession;
//         $data['status'] = $request->availability;
//         $data['bio'] = $request->biography;


//         Candidate::updateOrCreate(
//             ['user_id' => auth()->user()->id],
//             $data
//         );

//         $candidate = Candidate::where('user_id', auth()->user()->id)->first();

//         CandidateLanguage::where('candidate_id', $candidate->id)?->delete();

//         foreach ($request->language_you_know as $language) {
//             # code...
//             $candidateLang = new CandidateLanguage();
//             $candidateLang->candidate_id = $candidate->id;
//             $candidateLang->language_id = $language;
//             $candidateLang->save();
//         }

//         CandidateSkill::where('candidate_id', $candidate->id)?->delete();
//         foreach ($request->skill_you_have as $skill) {
//             # code...
//             $candidateSkill = new CandidateSkill();
//             $candidateSkill->candidate_id = $candidate->id;
//             $candidateSkill->skill_id = $skill;
//             $candidateSkill->save();
//         }
//         // Calculate profile completion percentage
//         $profileCompletion = getCandidateProfileCompletion(); // Assuming this function is available

//         // Update candidate profile completion and visibility based on percentage
//         $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
//         if ($candidateProfile) {
//             $candidateProfile->profile_complete = $profileCompletion == 100 ? 1 : 0; // Use 1 for complete, 0 for incomplete
//             $candidateProfile->visibility = $profileCompletion == 100 ? 1 : 0; // Set visibility based on completion
//             $candidateProfile->save(); // Save the updates
//         }

//         Notify::updatedNotification();

//         // Pass profile completion percentage to the view
//         return redirect()->back()->with('profileCompletion', $profileCompletion);
//     }


//     /***
//      * Account info update
//      */
//     function accountInfoUpdate(CandidateAccountInfoUpdateRequest $request): RedirectResponse
//     {
//         Candidate::updateOrCreate(
//             ['user_id' => auth()->user()->id],
//             [
//                 'country' => $request->country,
//                 'state' => $request->state,
//                 'city' => $request->city,
//                 'address' => $request->address,
//                 'phone_one' => $request->phone_one,
//                 'phone_two' => $request->phone_two,
//                 'email' => $request->email,
//             ]
//         );

//       // Calculate profile completion percentage
//       $profileCompletion = getCandidateProfileCompletion(); // Assuming this function is available

//       // Update candidate profile completion and visibility based on percentage
//       $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();
//       if ($candidateProfile) {
//           $candidateProfile->profile_complete = $profileCompletion == 100 ? 1 : 0; // Use 1 for complete, 0 for incomplete
//           $candidateProfile->visibility = $profileCompletion == 100 ? 1 : 0; // Set visibility based on completion
//           $candidateProfile->save(); // Save the updates
//       }

//       Notify::updatedNotification();

//       // Pass profile completion percentage to the view
//       return redirect()->back()->with('profileCompletion', $profileCompletion);
//   }



//     /**
//      * Account Email Update
//      */

//     function accountEmailUpdate(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'account_email' => ['required', 'email'],
//         ]);

//         Auth::user()->update(['email' => $request->account_email]);
//         Notify::updatedNotification();

//         return redirect()->back();
//     }


//     /**
//      * Account Password Update
//      */
//     function accountPasswordUpdate(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//         ]);

//         Auth::user()->update(['password' => bcrypt($request->password)]);

//         Notify::updatedNotification();

//         return redirect()->back();
//     }

//     /***
//      *
//      * Update profile complete status
//      */
//     // function updateProfileStatus(): void
//     // {
//     //     // Calculate profile completion percentage
//     //     $profileCompletion = getCandidateProfileCompletion(); // Assuming this function returns a percentage

//     //     // Check if profile is fully complete (100%)
//     //     if ($profileCompletion == 100) {
//     //         $candidate = Candidate::where('user_id', auth()->user()->id)->first();

//     //         // Set profile as complete and make it visible
//     //         $candidate->profile_complete = 1;
//     //         $candidate->visibility = 1;
//     //         $candidate->save();
//     //     } else {
//     //         // Optionally, reset visibility if profile is incomplete
//     //         $candidate = Candidate::where('user_id', auth()->user()->id)->first();
//     //         $candidate->visibility = 0; // Hide if not fully complete
//     //         $candidate->save();
//     //     }
//     // }
// }

class CandidateProfileController extends Controller
{
    use FileUploadTrait;

    public function index(): View
    {
        $candidate = Candidate::with(['skills', 'languages'])
            ->where('user_id', auth()->user()->id)
            ->first();



        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate?->id)
            ->orderBy('id', 'DESC')
            ->get();

        $candidateEducations = CandidateEducation::where('candidate_id', $candidate?->id)
            ->orderBy('id', 'DESC')
            ->get();

        $experiences = Experience::all();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();
        $countries = Country::all();
        $states = State::where('country_id', $candidate?->country)->get();
        $cities = City::where('state_id', $candidate?->state)->get();


        // dd($completionPercentage);

        return view('frontend.candidate-dashboard.profile.index', compact(
            'candidate',
            'candidateExperiences',
            'candidateEducations',
            'experiences',
            'professions',
            'skills',
            'languages',
            'countries',
            'states',
            'cities'
        ));
    }

    public function basicInfoUpdate(CandidateBasicProfileUpdateRequest $request): RedirectResponse
    {
        $data = $this->handleFileUploads($request);
        $data['full_name'] = $request->full_name;
        $data['title'] = $request->title;
        $data['experience_id'] = $request->experience_level;
        $data['website'] = $request->website;
        $data['birth_date'] = $request->date_of_birth;

        $this->updateCandidateProfile($data);
        $this->updateProfileStatus();

        Notify::updatedNotification();
        return redirect()->back();
    }

    public function profileInfoUpdate(CandidateProfileInfoUpdateRequest $request): RedirectResponse
    {
        $data = [
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'profession_id' => $request->profession,
            'status' => $request->availability,
            'bio' => $request->biography,
        ];

        $this->updateCandidateProfile($data);

        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        if ($candidate) {
            $this->updateCandidateLanguages($candidate, $request->language_you_know);
            $this->updateCandidateSkills($candidate, $request->skill_you_have);
        }

        $this->updateProfileStatus();
        Notify::updatedNotification();

        return redirect()->back();
    }

    public function accountInfoUpdate(CandidateAccountInfoUpdateRequest $request): RedirectResponse
    {
        $data = [
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
        ];

        $this->updateCandidateProfile($data);
        $this->updateProfileStatus();

        Notify::updatedNotification();
        return redirect()->back();
    }

    public function accountEmailUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'account_email' => ['required', 'email'],
        ]);

        Auth::user()->update(['email' => $request->account_email]);
        Notify::updatedNotification();

        return redirect()->back();
    }

    public function accountPasswordUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Auth::user()->update(['password' => bcrypt($request->password)]);
        Notify::updatedNotification();

        return redirect()->back();
    }

    /**
     * Handle file uploads for the candidate profile.
     */
    private function handleFileUploads($request): array
    {
        $data = [];
        $imagePath = $this->uploadFile($request, 'profile_picture');
        $cvPath = $this->uploadFile($request, 'cv');

        if (!empty($imagePath)) $data['image'] = $imagePath;
        if (!empty($cvPath)) $data['cv'] = $cvPath;

        return $data;
    }

    /**
     * Update the candidate profile.
     */
    private function updateCandidateProfile(array $data): void
    {
        Candidate::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );
    }

    /**
     * Update candidate languages.
     */
    private function updateCandidateLanguages($candidate, $languages): void
    {
        CandidateLanguage::where('candidate_id', $candidate->id)->delete();

        foreach ($languages as $language) {
            CandidateLanguage::create([
                'candidate_id' => $candidate->id,
                'language_id' => $language,
            ]);
        }
    }

    /**
     * Update candidate skills.
     */
    private function updateCandidateSkills($candidate, $skills): void
    {
        CandidateSkill::where('candidate_id', $candidate->id)->delete();

        foreach ($skills as $skill) {
            CandidateSkill::create([
                'candidate_id' => $candidate->id,
                'skill_id' => $skill,
            ]);
        }
    }

    /**
     * Update profile completion status.
     */
    private function updateProfileStatus(): void
    {
        $candidate = Candidate::where('user_id', auth()->user()->id)->first();
        if ($candidate) {
            $profileCompletion = getCandidateProfileCompletion(); // Ensure this function exists
            $candidate->profile_complete = $profileCompletion == 100 ? 1 : 0;
            $candidate->visibility = $profileCompletion == 100 ? 1 : 0;
            $candidate->save();
        }
    }
}
