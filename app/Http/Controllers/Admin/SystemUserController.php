<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\User;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SystemUserController extends Controller
{
    use FileUploadTrait, Searchable;
    //
    public function index(Request $request): View
    {
        // Start the query for users, including the related candidate and company models
        $query = User::with(['candidateProfile', 'company']);

        // Apply search logic
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;

            // Search in the User model's name, email, role, created_at, and updated_at
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%$searchTerm%")
                    ->orWhere('email', 'like', "%$searchTerm%")
                    ->orWhere('role', 'like', "%$searchTerm%")
                    ->orWhere('created_at', 'like', "%$searchTerm%")
                    ->orWhere('updated_at', 'like', "%$searchTerm%");
            });

            // Additionally, search in the related Candidate profile and Company fields
            $query->orWhere(function ($q) use ($searchTerm) {
                // Searching candidate profile fields (make sure these fields exist on your Candidate model)
                $q->whereHas('candidateProfile', function ($q) use ($searchTerm) {
                    $q->where('full_name', 'like', "%$searchTerm%")
                        ->orWhere('email', 'like', "%$searchTerm%");
                })
                    // Searching company model fields (make sure these fields exist on your Company model)
                    ->orWhereHas('company', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%")
                            ->orWhere('website', 'like', "%$searchTerm%")
                            ->orWhere('email', 'like', "%$searchTerm%");
                    });
            });
        }

        // Paginate results
        $users = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function candidates(): View
    {

        $query = Candidate::query();

        $this->search($query, [
            'full_name',
            'title',
            'website',
            'birth_date',
            'gender',
            'marital_status',
            'status',
            'bio',
            'address',
            'phone_one',
            'phone_two',
            'email',
            'created_at',
            'updated_at'
        ]);

        $candidates = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.users.candidates', compact('candidates'));
    }

    public function companies(): View
    {
        $query = Company::query();

        $this->search($query, [
            'name',
            'bio',
            'vision',
            'website',
            'bio',
            'address',
            'email',
            'phone',
            'created_at',
            'updated_at'
        ]);

        $companies = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.users.companies', compact('companies'));
    }

    public function show($id)
    {
        $user = User::with(['candidateProfile.candidateCountry', 'candidateProfile.profession', 'company.industryType'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit(string $id): View
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:candidate,company',
        ]);

        // if ($imagePath) $blog->image = $imagePath;
        // Update the user details
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
}
