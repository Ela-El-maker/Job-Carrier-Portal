<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Country;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendCandidatePageController extends Controller
{

    function index(Request $request): View
    {
        // Use select to only fetch needed columns for dropdowns
        $skills = Skill::select('id', 'name', 'slug')->get();
        $experience = Experience::select('id', 'name')->get();
        $query = Candidate::query();
        $countries = Country::select('id', 'name')->get();
        $selectedStates = null;
        $selectedCities = null;


        $query->where(['profile_complete' => true, 'visibility' => true]);



        if ($request->has('search') && $request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }
        if ($request->has('country') && $request->filled('country')) {
            $query->where('country', $request->country);
            $selectedStates = State::where('country_id', $request->country)->get();
        }

        if ($request->has('state') && $request->filled('state')) {
            $query->where('state_id', $request->state);
            $selectedCities = City::where('state_id', $request->state)->get();
        }

        if ($request->has('city') && $request->filled('city')) {
            $query->where('city', $request->city);
        }



        if ($request->has('skills') && $request->filled('skills')) {
            $ids = Skill::whereIn('slug', $request->skills)->pluck('id')->toArray();
            $query->whereHas('skills', function ($subquery) use ($ids) {
                $subquery->whereIn('skill_id', $ids);
            });
        }


        if ($request->has('experience') && $request->filled('experience')) {
            $query->where('experience_id', $request->experience);
        }
        $totalCandidates = Candidate::where(['profile_complete' => true, 'visibility' => true])->count();

        // Add eager loading for candidate relationships
        $query->with(['profession:id,name', 'experience:id,name', 'candidateCountry:id,name', 'candidateState:id,name', 'candidateCity:id,name']);

        $candidates = $query->paginate(7);

        return view('frontend.pages.candidate-index', compact('candidates', 'skills', 'experience', 'totalCandidates', 'countries', 'selectedStates', 'selectedCities'));
    }

    function show(string $slug): View
    {
        $candidate = Candidate::with([
            'candidateCountry:id,name',
            'candidateState:id,name',
            'candidateCity:id,name',
            'profession:id,name',
            'experience:id,name',
            'skills.skill:id,name',
            'languages.language:id,name',
            'educations:id,candidate_id,level,degree,year',
            'experiences:id,candidate_id,company,department,designation,start,end,currently_working',
            'portfolio'
        ])->where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();

        return view('frontend.pages.candidate-details', compact('candidate'));
    }
}
