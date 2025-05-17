<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SponserController extends Controller
{
    use Searchable, FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:site settings']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $sponsors = Sponsor::latest()->paginate(10);
        return view('admin.sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.sponsor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,svg,jpeg,png,webp|max:2048',
        ]);
        $imagePath = $this->uploadFile($request, 'logo');

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        $sponsor->logo = $imagePath;
        $sponsor->show = $request->show;
        $sponsor->save();

        Notify::createdNotification();

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor created successfully!');
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
    public function  edit(Sponsor $sponsor): View
    {
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,svg,jpeg,png,webp|max:2048',
        ]);
        $imagePath = $this->uploadFile($request, 'logo');

        $sponsor =  Sponsor::findOrFail($id);
        $sponsor->name = $request->name;
        $sponsor->url = $request->url;
        $sponsor->show = $request->show;
        if ($imagePath) $sponsor->logo = $imagePath;

        $sponsor->save();

        Notify::updatedNotification();

        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor Updated successfully!');
    }

    public function changeStatus(Request $request, $id): Response
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->show = $request->input('status') === '1' ? 1 : 0;
        $sponsor->save();

        Notify::updatedNotification();
        return response(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Sponsor::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
