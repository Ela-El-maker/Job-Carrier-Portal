<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ClientReviewController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $query = ClientReview::query();
        $this->search($query, [ 'review', 'rating', 'created_at','updated_at']);
        $reviews = $query->latest()->paginate(10);


        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $review = ClientReview::findOrFail($id);
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $review = ClientReview::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:2000',
            'is_approved' => 'nullable|boolean',
        ]);

        $review = ClientReview::findOrFail($id);
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->is_approved = $request->is_approved; // 0 or 1
        $review->save();

        Notify::updatedNotification();
        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            ClientReview::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }

    public function changeStatus(Request $request, $id): Response
    {
        $review = ClientReview::findOrFail($id);
        $review->is_approved = $request->input('status') === '1' ? 1 : 0;
        $review->save();

        Notify::updatedNotification();
        return response(['message' => 'success'], 200);
    }
}
