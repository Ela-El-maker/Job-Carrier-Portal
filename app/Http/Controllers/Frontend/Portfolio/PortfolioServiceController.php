<?php

namespace App\Http\Controllers\Frontend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\PortfolioService;
use Illuminate\Http\Request;

class PortfolioServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = PortfolioService::where('candidate_id', auth()->user()?->candidateProfile?->id)->orderBy('id', 'DESC')->get();
        return view('frontend.candidate-dashboard.portfolio.ajax-service-table', compact('services'))->render();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
