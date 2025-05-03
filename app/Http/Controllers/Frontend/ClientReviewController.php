<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientReviewController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();
        $userRole = $user?->role;

        // Base query filtered by user
        $query = ClientReview::where('user_id', $user?->id);

        // Apply search
        $this->search($query, ['review', 'rating', 'created_at']);

        // Apply ordering and pagination
        $reviews = $query->orderBy('created_at', 'desc')->paginate(10);

        if ($userRole === 'candidate') {
            return view('frontend.candidate-dashboard.reviews.index', compact('reviews'));
        } elseif ($userRole === 'company') {
            return view('frontend.company-dashboard.reviews.index', compact('reviews'));
        }

        // Optionally, handle unauthorized roles
        abort(403, 'Unauthorized access.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $userRole = auth()->user()?->role;
        $reviews = ClientReview::where('user_id', auth()->user()?->id)->get();
        if ($userRole === 'candidate') {
            return view('frontend.candidate-dashboard.reviews.create');
        } elseif ($userRole === 'company') {
            return view('frontend.company-dashboard.reviews.create');
        }
        // Optionally, handle unauthorized roles
        abort(403, 'Unauthorized access.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string'],
        ]);
        $user = auth()->user();
        ClientReview::create([
            'user_id' => $user->id,
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        Notify::createdNotification();
        return redirect()->route('client-reviews.index')->with('success', 'Your review has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = auth()->user();

        // Fetch only the specific review that belongs to the logged-in user
        $review = ClientReview::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        if ($user->role === 'candidate') {
            return view('frontend.candidate-dashboard.reviews.show', compact('review'));
        } elseif ($user->role === 'company') {
            return view('frontend.company-dashboard.reviews.show', compact('review'));
        }

        // $candidate = $review->candidate;
        // dd($candidate);
        abort(403, 'Unauthorized access.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = auth()->user();

        // Ensure the review exists and belongs to the authenticated user
        $review = ClientReview::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        if ($user->role === 'candidate') {
            return view('frontend.candidate-dashboard.reviews.edit', compact('review'));
        } elseif ($user->role === 'company') {
            return view('frontend.company-dashboard.reviews.edit', compact('review'));
        }


        abort(403, 'Unauthorized access.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        {
            $this->validate($request, [
                'rating' => ['required', 'integer', 'between:1,5'],
                'review' => ['required', 'string'],
            ]);

            $review = ClientReview::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

            $review->update([
                'rating' => $request->rating,
                'review' => $request->review,
            ]);

            Notify::updatedNotification();

            return redirect()->route('client-reviews.index')->with('success', 'Review updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
