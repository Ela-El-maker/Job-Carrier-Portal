<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateDashboardController extends Controller
{
    //
    function index(): View
    {
        $candidateDashboard = Candidate::all();
        $candidate = Candidate::with(['skills', 'languages'])
            ->where('user_id', auth()->user()->id)
            ->first();

        return view('frontend.candidate-dashboard.dashboard', compact('candidateDashboard', 'candidate'));
    }
}
