<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PricingPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //

        if (auth()->user()?->role === 'candidate') {
            return response()
                ->view('errors.403', ['message' => 'This page is for companies only.'], 403);
        }


        $plans = Plan::where(['frontend_show' => 1])->get();
        return view('frontend.pages.pricing-index', compact('plans'));
    }
}
