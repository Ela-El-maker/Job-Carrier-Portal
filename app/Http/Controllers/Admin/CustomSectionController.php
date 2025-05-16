<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomSection;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomSectionController extends Controller
{
    use FileUploadTrait;
    function __construct()
    {
        $this->middleware(['permission:job sections']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $section = CustomSection::first();
        return view('admin.custom-section.index', compact('section'));
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
            'sub_title'    => 'required|max:500',
            'button_label' => 'required|max:255',
            'button'   => 'required|url|max:255',
            'media_type'   => 'required|in:image,video',
            'media_path'   => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi,webm|max:20480',
        ]);

        $section = CustomSection::firstOrNew(['id' => 1]);

        $mediaPath = $request->hasFile('media_path')
            ? $this->uploadFile($request, 'media_path', $section->media_path ?? null, 'uploads/media')
            : $section->media_path;

            $data = [
                'title'        => $request->title,
                'sub_title'    => $request->sub_title,
                'button_label' => $request->button_label,
                'button'   => $request->button,
                'media_type'   => $request->media_type,
                'media_path'   => $mediaPath,
            ];
        // dd($data);
        CustomSection::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Custom section updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
