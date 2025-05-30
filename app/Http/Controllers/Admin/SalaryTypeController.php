<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\SalaryType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryTypeController extends Controller
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
        $query = SalaryType::query();

        $this->search($query, ['name', 'slug']);

        $salaryTypes = $query->paginate(10);

        return view('admin.job.salary-type.index', compact('salaryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.job.salary-type.create');
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

        $salaryType = new SalaryType();
        $salaryType->name = $request->name;
        $salaryType->save();

        Notify::createdNotification();

        return to_route('admin.salary-type.index')->with('success', 'Salary Type added successfully');
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
        $salaryType = SalaryType::findOrFail($id);
        return view('admin.job.salary-type.edit', compact('salaryType'));
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

        $salaryType = SalaryType::findOrFail($id);
        $salaryType->name = $request->name;
        $salaryType->save();

        Notify::updatedNotification();

        return to_route('admin.salary-type.index')->with('success', 'Salary Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $jobExists = Job::where('salary_type_id', $id)->exists();
        if ($jobExists) {
            return response(['message' => 'This item is already being used. Can\'t Delete'], 500);
        }
        try {
            SalaryType::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
