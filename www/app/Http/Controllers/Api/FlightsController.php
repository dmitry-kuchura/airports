<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Repositories\FlightsRepository;
use Illuminate\Http\Response;

class FlightsController extends Controller
{
    protected $repository;

    public function __construct(FlightsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(SearchRequest $request)
    {
        $result = $this->repository->search($request->get("searchQuery"));

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
                "departureDateTime" => Carbon::parse($obj->departure_at)->format("Y-m-d H:i"),
                "arrivalDateTime" => Carbon::parse($obj->arrival_at)->format("Y-m-d H:i"),
                "duration" => Carbon::parse($obj->departure_at)->diffInMinutes(Carbon::parse($obj->arrival_at))
            ];
        }

        return $this->returnResponse([
            "searchQuery" => [
                "departureAirport" => $request->input("searchQuery.departureAirport"),
                "arrivalAirport" => $request->input("searchQuery.arrivalAirport"),
                "departureDate" => $request->input("searchQuery.departureDate"),
            ],
            "searchResults" => $search
        ], Response::HTTP_OK);
    }
}
