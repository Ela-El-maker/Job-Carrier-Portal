<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateMyJobController extends Controller
{
    use Searchable;

    // function index(): View
    // {
    //     $appliedJobs = AppliedJob::with('job')->where('candidate_id', auth()->user()->id)->paginate(15);
    //     // dd($appliedJobs);
    //     return view('frontend.candidate-dashboard.my-job.index', compact('appliedJobs'));
    // }

    // public function index(): View
    // {
    //     $query = AppliedJob::query();

    //     $this->search($query, ['name', 'slug']);

    //     $appliedJobs = $query->with(['job'])
    //         ->orderBy('created_at', 'desc') // Order by latest applied jobs first
    //         ->where('candidate_id',  auth()->user()->id)
    //         ->paginate(15);

    //     // dd($appliedJobs);
    //     return view('frontend.candidate-dashboard.my-job.index', compact('appliedJobs'));
    // }

    public function index(): View
{
    $candidate = Candidate::where('user_id', auth()->id())->first();

    if (!$candidate) {
        abort(403, 'Candidate profile not found');
    }

    $query = AppliedJob::query();

    $this->search($query, ['name', 'slug']);

    $appliedJobs = $query->with(['job'])
        ->where('candidate_id', $candidate->id)
        ->orderBy('created_at', 'desc')
        ->paginate(15);

    return view('frontend.candidate-dashboard.my-job.index', compact('appliedJobs'));
}

}
