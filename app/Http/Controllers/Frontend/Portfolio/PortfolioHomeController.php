<?php

namespace App\Http\Controllers\Frontend\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioHomeController extends Controller
{
    //

    function index(): View
    {
        return view('frontend.portfolio.index');
    }

    function show($slug): View
    {
        return view('frontend.portfolio.show');
    }
}
