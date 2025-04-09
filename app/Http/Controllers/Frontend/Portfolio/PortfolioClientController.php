<?php

namespace App\Http\Controllers\Frontend\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\PortfolioClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $portfolioClients = PortfolioClient::where('candidate_id', auth()->user()?->candidateProfile?->id)->orderBy('id', 'DESC')->get();
        return view('frontend.candidate-dashboard.portfolio.ajax-client-table', compact('portfolioClients'))->render();
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
            'client_name' => ['required', 'max:255'],
            'client_company' => ['required', 'max:255'],
            'client_title' => ['required', 'max:255'],
            'client_note' => ['required', 'max:500'],
            'client_visible' => ['required', 'boolean'],
        ]);
        $client = new PortfolioClient();
        $client->candidate_id = auth()->user()->candidateProfile->id;

        $client->client_name = $request->client_name;
        $client->client_company = $request->client_company;
        $client->client_title = $request->client_title;
        $client->client_note = $request->client_note;
        $client->client_visible = $request->client_visible;

        $client->save();

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
        $client = PortfolioClient::find($id);
        return response($client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): Response
    {
        //
        $request->validate([
            'client_name' => ['required', 'max:255'],
            'client_company' => ['required', 'max:255'],
            'client_title' => ['required', 'max:255'],
            'client_note' => ['required', 'max:500'],
            'client_visible' => ['required', 'boolean'],
        ]);
        $client = PortfolioClient::find($id);

        if (auth()->user()->candidateProfile->id  !== $client->candidate_id) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $client->client_name = $request->client_name;
        $client->client_company = $request->client_company;
        $client->client_title = $request->client_title;
        $client->client_note = $request->client_note;
        $client->client_visible = $request->client_visible;

        $client->save();

        return response(['message' => 'Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $client = PortfolioClient::find($id);
            if (auth()->user()->candidateProfile->id  !== $client->candidate_id) {
                return response(['message' => 'Unauthorized'], 401);
            }
            $client->delete();
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Error Deleting Client'], 500);
        }
    }
}
