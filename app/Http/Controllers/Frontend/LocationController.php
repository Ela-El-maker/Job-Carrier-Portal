<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    //
    /***Get all the states of a country by country id
     * @param $country_id
     */
    // function getStates(string $countryId): Response
    // {
    //     $states = State::select([
    //         'id',
    //         'name',
    //         'country_id'
    //         ])
    //         ->where(
    //             'country_id',
    //             $countryId)
    //             ->get();
    //     return response($states);
    // }
    // /***Get all the cities of a states by state id
    //  * @param $country_id
    //  */
    // function getCities(string $stateId) : Response
    // {
    //     $cities = City::select(['id', 'name', 'state_id','country_id'])->where('state_id', $stateId)->get();
    //     return response($cities);
    // }

    // Get states by country ID
    function getStates(string $countryId): JsonResponse
    {
        $states = State::select('id', 'name')
            ->where('country_id', $countryId)
            ->get();
        return response()->json($states);
    }

    // Get cities by state ID
    function getCities(string $stateId): JsonResponse
    {
        $cities = City::select('id', 'name')
            ->where('state_id', $stateId)
            ->get();
        return response()->json($cities);
    }
}
