<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\OrganizationType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrganizationTypeController extends Controller
{

    function __construct()
    {
        $this->middleware(['permission:job attributes']);
    }
    /**
     * Display a listing of the resource.
     */
    use Searchable;
    public function index(): View
    {
        //
        // dd($request->search);
        $query = OrganizationType::query();

        $this->search($query, ['name']);

        $organizationTypes = $query->paginate(10);

        return view('admin.organization-type.index', compact('organizationTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.organization-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organization_types,name'],
        ]);
        $type = new OrganizationType();
        $type->name = $request->name;
        $type->save();
        Notify::createdNotification();
        return to_route('admin.organization-types.index');
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
        $organizationType = OrganizationType::findOrFail($id);
        return view('admin.organization-type.edit', compact('organizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:organization_types,name,' . $id],
        ]);
        $type = OrganizationType::findorfail($id);
        $type->name = $request->name;
        $type->save();
        Notify::updatedNotification();
        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
        $company = Company::where('organization_type_id', $id)->exists();
        if ($company) {
            return response(['message' => 'This item is already being used. Can\'t Delate'], 500);
        }
        try {
            OrganizationType::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
