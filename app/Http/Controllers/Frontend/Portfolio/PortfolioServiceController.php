<?php

namespace App\Http\Controllers\Frontend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\PortfolioService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $portfolioServices = PortfolioService::where('candidate_id', auth()->user()?->candidateProfile?->id)->orderBy('id', 'DESC')->get();
        return view('frontend.candidate-dashboard.portfolio.ajax-service-table', compact('portfolioServices'))->render();
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
    public function store(Request $request): Response
    {
        //
        $request->validate([
            'service_name' => ['required', 'max:255'],
            'service_description' => ['required', 'max:500'],
            'service_url' => ['nullable', 'url'],
            'service_icon' => ['required', 'max:255'],
            'service_visible' => ['required', 'boolean'],
        ]);
        $service = new PortfolioService();
        $service->candidate_id = auth()->user()->candidateProfile->id;

        $service->service_name = $request->service_name;
        $service->service_description = $request->service_description;
        $service->service_url = $request->service_url;
        $service->service_icon = $request->service_icon;
        $service->service_visible = $request->service_visible;
        $service->service_description = $request->service_description;

        $service->save();

        return response(['message' => 'Created Successfully'], 200);
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
    public function edit(string $id): Response
    {
        //
        $service = PortfolioService::findorfail($id);
        return response($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        //
        $service = PortfolioService::findorfail($id);

        if (auth()->user()->candidateProfile->id  !== $service->candidate_id) {

            return response(['message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'service_name' => ['required', 'max:255'],
            'service_description' => ['required', 'max:500'],
            'service_url' => ['nullable', 'url'],
            'service_visible' => ['required', 'boolean'],
        ]);
        $service->service_name = $request->service_name;
        $service->service_description = $request->service_description;
        $service->service_url = $request->service_url;
        $service->service_icon = $request->service_icon;
        $service->service_visible = $request->service_visible;
        $service->service_description = $request->service_description;

        $service->save();

        return response(['message' => 'Updated Successfully'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        //
        try {
            $service = PortfolioService::findorfail($id);


            if (auth()->user()->candidateProfile->id  !== $service->candidate_id) {
                return response(['message' => 'Unauthorized'], 401);
            }

            $service->delete();

            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Exception $e) {
            logger($e);

            return response(['message' => 'Something Went Wrong! Please Try Again'], 500);
        }
    }
}
