<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomPageBuilder;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CustomPageBuilderController extends Controller
{
    use Searchable;

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
        $query = CustomPageBuilder::query();
        $this->search($query, ['page_name','content','status', 'slug', 'created_at', 'updated_at']);
        $pages = $query->latest()->paginate(10);

        return view('admin.page-builder.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('admin.page-builder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'page_name' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'status' => ['required', 'in:draft,published'],
            'show' => ['nullable', 'boolean'],
        ]);

        $page = new CustomPageBuilder();
        $page->page_name = $request->page_name;
        $page->content = $request->content;
        $page->status = $request->status;
        $page->show = $request->show;
        $page->save();

        Notify::createdNotification();
        return redirect()->route('admin.page-builder.index')
            ->with('success', 'Custom Page Created Successfully!');
    }
    public function changeStatus(Request $request, $id): Response
    {
        $page = CustomPageBuilder::findOrFail($id);
        $page->show = $request->input('status') === '1' ? 1 : 0;
        $page->save();

        Notify::updatedNotification();
        return response(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : View
    {
        //
        $page = CustomPageBuilder::findOrFail($id);
        return view('admin.page-builder.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        //
        $page = CustomPageBuilder::findOrFail($id);
        return view('admin.page-builder.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $page = CustomPageBuilder::findOrFail($id);
        $this->validate($request, [
            'page_name' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'status' => ['required', 'in:draft,published'],
            'show' => ['nullable', 'boolean'],
        ]);


        $page->page_name = $request->page_name;
        $page->content = $request->content;
        $page->status = $request->status;
        $page->show = $request->show;
        $page->save();

        Notify::updatedNotification();
        return redirect()->route('admin.page-builder.index')
            ->with('success', 'Custom Page Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            CustomPageBuilder::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
