<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\ViewTracker;
use App\Traits\Searchable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendBlogPageController extends Controller
{
    use Searchable;
    //
    public function index(): View
    {
        $query = Blog::query();

        $this->search($query, ['title', 'created_at', 'updated_at']);

        $blogs = $query->where('status', 1)->latest()->paginate(10);

        $featured = Blog::where('status', 1)->where('featured', 1)->orderBy('id', 'DESC')->take(10)->get();
        $popularPosts = Blog::where('status', 1)
            ->where('show_at_popular', 1)  // Exclude posts that are already featured
            ->latest()  // Most recent first
            ->take(5)
            ->get();
        return view('frontend.pages.blog-index', compact('blogs', 'featured', 'popularPosts'));
    }
    public function show(string $slug, Request $request): View
    {
        $blog = Blog::where('slug', $slug)->where('status', 1)->firstOrFail();

        app(ViewTracker::class)->track($blog, $request);

        $previousPost = Blog::where('status', 1)
            ->where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextPost = Blog::where('status', 1)
            ->where('id', '>', $blog->id)
            ->orderBy('id')
            ->first();

        return view('frontend.pages.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }
}
