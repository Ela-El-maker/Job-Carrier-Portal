<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialIcon;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SocialIconController extends Controller
{
    use Searchable;
    function __construct()
    {
        $this->middleware(['permission:Site footer']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //

        $query = SocialIcon::query();
        $this->search($query, ['url', 'icon', 'show', 'created_at', 'updated_at']);
        $socialIcons = $query->latest()->paginate(10);


        return view('admin.footer-socials.index', compact('socialIcons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.footer-socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'icon' => 'required|string|max:255',
            'url' => 'required|max:2048',
        ]);

        $socialIcon = new SocialIcon();
        $socialIcon->icon = $request->icon;
        $socialIcon->url = $request->url;
        $socialIcon->save();

        Notify::createdNotification(); // Assuming this is a custom notification helper

        return redirect()
            ->route('admin.social-icon.index')
            ->with('success', 'Social icon created successfully.');
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
        $socialIcon = SocialIcon::findOrFail($id);
        return view('admin.footer-socials.edit', compact('socialIcon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'url' => 'required|max:2048',
        ]);

        $socialIcon = SocialIcon::findOrFail($id);

        if ($request->filled('icon')) {
            $socialIcon->icon = $request->icon;
        }

        $socialIcon->url = $request->url;
        $socialIcon->save();

        Notify::updatedNotification(); // Prefer "updated" over "created" for semantic clarity

        return redirect()
            ->route('admin.social-icon.index')
            ->with('success', 'Social icon updated successfully.');
    }

     public function changeStatus(Request $request, $id): Response
    {
        $social = SocialIcon::findOrFail($id);
        $social->show = $request->input('status') === '1' ? 1 : 0;
        $social->save();

        Notify::updatedNotification();
        return response(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //
        try {
            SocialIcon::findorfail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
