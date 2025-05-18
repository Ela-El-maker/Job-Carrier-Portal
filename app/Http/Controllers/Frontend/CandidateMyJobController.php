<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Candidate;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateMyJobController extends Controller
{
    use Searchable;



    public function index(): View | RedirectResponse
    {
        $candidate = Candidate::where('user_id', auth()->id())->first();
        if (!$candidate) {
            return redirect()
                ->route('candidate.profile.index') // or wherever the profile form is
                ->with('error', 'Please complete your candidate profile to view applied jobs.');
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
