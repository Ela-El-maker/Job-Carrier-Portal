<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSectionSetting;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogSectionSettingController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:job sections']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogSection = BlogSectionSetting::first();
        return view('admin.blog-section-setting.index', compact('blogSection'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('admin.blog-section-setting.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable',
        ]);

        BlogSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );
        Notify::updatedNotification();

        return redirect()->back()->with('success', 'Blog section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
