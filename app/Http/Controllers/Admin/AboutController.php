<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    use FileUploadTrait;

     function __construct()
    {
        $this->middleware(['permission:Site Pages']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $about = About::first();
        return view('admin.about-us.index', compact('about'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'        => 'required|string|max:100',
            'description'=> 'required|string|max:1000',
            'media_type'   => 'required|in:image,video',
            'media_path'   => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
        ]);

        $section = About::firstOrNew(['id' => 1]);

        $mediaPath = $request->hasFile('media_path')
            ? $this->uploadFile($request, 'media_path', $section->media_path ?? null, 'uploads/media')
            : $section->media_path;

        $data = [
            'title'        => $request->title,
            'description'=> $request->description,
            'media_type'   => $request->media_type,
            'media_path'   => $mediaPath,
        ];
        // dd($data);
        About::updateOrCreate(['id' => 1], $data);
        Notify::updatedNotification();
        return redirect()->back()->with('success', 'About section updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
