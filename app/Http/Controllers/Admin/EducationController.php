<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Job;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EducationController extends Controller
{
    use Searchable;
    function __construct()
    {
        $this->middleware(['permission:job attributes']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Education::query();
        $this->search($query, ['name', 'slug']);

        $educations = $query->orderBy('id', 'DESC')->paginate(10);
        return view('admin.job.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.job.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $education = new Education();
        $education->name = $request->name;
        $education->save();

        Notify::createdNotification();

        return redirect()->route('admin.educations.index')->with('success', 'Education added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        //
        $education = Education::findOrFail($id);
        return view('admin.job.educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $education = Education::findOrFail($id);
        $education->name = $request->name;
        $education->save();

        Notify::updatedNotification();

        return redirect()->route('admin.educations.index')->with('success', 'Education updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $jobExists = Job::where('education_id', $id)->exists();
        if ($jobExists) {
            return response(['message' => 'This item is already being used. Can\'t Delete'], 500);
        }
        try {
            Education::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
