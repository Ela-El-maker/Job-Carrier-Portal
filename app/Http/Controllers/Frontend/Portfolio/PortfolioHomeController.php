<?php

namespace App\Http\Controllers\Frontend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidatePortfolio;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioHomeController extends Controller
{
    //

    function index(): View
    {
        return view('frontend.portfolio.index');
    }

    function show($slug): View
    {
        // First find the candidate
        $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'slug' => $slug])->firstOrFail();

        // Then get their portfolio (assuming there's a relationship)
        $candidatePortfolio = $candidate->portfolio; // or whatever your relationship is

        if (!$candidatePortfolio) {
            // Show a custom "not found" view
            return view('frontend.portfolio.portfolio-not-found', compact('candidate'));
        }

        // dd($candidatePortfolio->candidate_id);

        // dd($candidatePortfolio->portfolioServices);
        return view('frontend.portfolio.show', compact('candidatePortfolio'));
    }
}
