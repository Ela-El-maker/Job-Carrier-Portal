<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroController extends Controller
{
    use FileUploadTrait, Searchable;

     function __construct()
    {
        $this->middleware(['permission:job sections']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Hero::query();

        $this->search($query, ['title', 'sub_title', 'created_at', 'updated_at']);

        $heroes = $query->paginate(10);

        return view('admin.hero.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string',
            'show_at_home' => 'required|boolean', // Ensure the checkbox is treated as a boolean
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5000',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5000',
        ]);
        // Assuming you have a Hero model and you're updating it
        $imagePath = $this->uploadFile($request, 'image');
        $backgroundImagePath = $this->uploadFile($request, 'background_image');



        $hero = new Hero();
        $hero->title = $request->title;
        $hero->sub_title = $request->sub_title;
        $hero->show_at_home = $request->show_at_home; // Check if the checkbox is checked
        $hero->image = $imagePath;
        $hero->background_image = $backgroundImagePath;
        $hero->save(); // Save the new hero record to the database


        Notify::createdNotification();
        return redirect()->route('admin.hero.index')->with('success', 'Hero section created successfully!');
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
        $hero = Hero::findOrFail($id); // Find the hero by ID or fail if not found
        return view('admin.hero.edit', compact('hero'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string',
            'show_at_home' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,webm,svg|max:5000',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,webm,svg|max:5000',
        ]);

        $imagePath = $this->uploadFile($request, 'image');
        $backgroundImagePath = $this->uploadFile($request, 'background_image');

        $hero = Hero::findOrFail($id);

        if ($imagePath) $hero->image = $imagePath;
        if ($backgroundImagePath) $hero->background_image = $backgroundImagePath;
        // If no new image is uploaded, keep the old one
        if (!$imagePath && !$backgroundImagePath) {
            // If no new images are uploaded, keep the old paths
            $imagePath = $hero->image;
            $backgroundImagePath = $hero->background_image;
        }

        $hero->title = $request->title;
        $hero->sub_title = $request->sub_title;
        $hero->show_at_home = $request->show_at_home; // Check if the checkbox is checked
        $hero->save(); // Save the updated hero record to the database


        Notify::updatedNotification();
        return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Hero::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
