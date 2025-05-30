<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobTypeController extends Controller
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
        //
        $query = JobType::query();

        $this->search($query, ['name', 'slug']);

        $jobTypes = $query->paginate(10);
        return view('admin.job.job-type.index', compact('jobTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.job.job-type.create');
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

        $jobType = new JobType();
        $jobType->name = $request->name;
        $jobType->save();

        Notify::createdNotification();

        return to_route('admin.job-type.index')->with('success', 'Job Type added successfully');
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

        $jobType = JobType::findOrFail($id);
        return view('admin.job.job-type.edit', compact('jobType'));
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

        $jobType = JobType::findOrFail($id);
        $jobType->name = $request->name;
        $jobType->save();
        Notify::updatedNotification();
        return to_route('admin.job-type.index')->with('success', 'Job Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $jobExists = Job::where('job_type_id', $id)->exists();
        if ($jobExists) {
            return response(['message' => 'This item is already being used. Can\'t Delete'], 500);
        }
        try {
            JobType::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
