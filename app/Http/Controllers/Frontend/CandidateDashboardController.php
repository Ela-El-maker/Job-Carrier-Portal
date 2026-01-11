<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Models\JobBookmark;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateDashboardController extends Controller
{
    //
    function index(): View
    {
        $candidate = auth()->user()->candidateProfile;
        
        if (!$candidate) {
            abort(404, 'Candidate profile not found');
        }
        
        $jobApplied = AppliedJob::where('candidate_id', $candidate->id)->count();
        $userBookmarkedJobs = JobBookmark::where('candidate_id', $candidate->id)->count();
        $appliedJobs = AppliedJob::with(['job:id,title,slug,company_id,status,deadline,job_type_id', 'job.company:id,name,logo,slug', 'job.jobType:id,name'])
            ->where('candidate_id', $candidate->id)
            ->orderBy('id','desc')
            ->paginate(5);

        return view('frontend.candidate-dashboard.dashboard', compact('jobApplied', 'appliedJobs','userBookmarkedJobs'));
    }
}
