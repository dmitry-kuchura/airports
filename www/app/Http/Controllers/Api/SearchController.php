<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Repositories\SearchRepository;
use Carbon\Carbon;

class SearchController extends Controller
{
    protected $repository;

    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(SearchRequest $request)
    {
        $result = $this->repository->search($request->all());

        $search = [];

        foreach ($result as $obj) {
            $search[] = [
                "transporter" => [
                    "code" => $obj->transporters_code,
                    "name" => $obj->transporters_name
                ],
                "flightNumber" => $obj->transporters_code . $obj->flight_number,
                "departureAirport" => $obj->departure_name,
                "arrivalAirport" => $obj->arrival_name,
                "departureDateTime" => Carbon::parse($obj->departure_at)->format('Y-m-d H:i'),
                "arrivalDateTime" => Carbon::parse($obj->arrival_at)->format('Y-m-d H:i'),
                "duration" => Carbon::parse($obj->departure_at)->diffInMinutes(Carbon::parse($obj->arrival_at))
            ];
        }

        return response()->json([
            "searchQuery" => [
                "departureAirport" => "IEV",
                "arrivalAirport" => "BUD",
                "departureDate" => "2018-07-01"
            ],
            "searchResults" => $search
        ], 200, [], JSON_NUMERIC_CHECK);
    }
}
