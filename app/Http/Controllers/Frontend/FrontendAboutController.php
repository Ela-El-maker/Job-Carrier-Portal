<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSectionSetting;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendAboutController extends Controller
{
    //
    function index() : View
    {
        $about = About::first();
        $reviews = ClientReview::where('is_approved', 1)->get();
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $blogTitle = BlogSectionSetting::first();
        return view('frontend.pages.about-page',compact('about','reviews','blogs','blogTitle'));
    }
}
