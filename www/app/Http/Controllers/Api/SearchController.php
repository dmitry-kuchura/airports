<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        return response()->json([
            "searchQuery" => [
                "departureAirport" => "IEV",
                "arrivalAirport" => "BUD",
                "departureDate" => "2018-07-01"
            ],
            "searchResults" => [
                [
                    "transporter" => [
                        "code" => "W6",
                        "name" => "WizzAir"
                    ],
                    "flightNumber" => "W64556",
                    "departureAirport" => "IEV",
                    "arrivalAirport" => "BUD",
                    "departureDateTime" => "2018-07-01 09:30",
                    "arrivalDateTime" => "2018-07-01 12:10",
                    "duration" => 100
                ],
                [
                    "transporter" => [
                        "code" => "PS",
                        "name" => "UkraineInternational"
                    ],
                    "flightNumber" => "PS1234",
                    "departureAirport" => "IEV",
                    "arrivalAirport" => "BUD",
                    "departureDateTime" => "2018-07-01 10:00",
                    "arrivalDateTime" => "2018-07-01 12:35",
                    "duration" => 95
                ],
                [
                    "transporter" => [
                        "code" => "W6",
                        "name" => "WizzAir"
                    ],
                    "flightNumber" => "W64558",
                    "departureAirport" => "IEV",
                    "arrivalAirport" => "BUD",
                    "departureDateTime" => "2018-07-01 18:00",
                    "arrivalDateTime" => "2018-07-01 20:30",
                    "duration" => 90
                ]
            ]
        ], 200, [], JSON_NUMERIC_CHECK);
    }
}
