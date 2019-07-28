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
        // Все правила и условия валидации написаны в файле app\Http\Requests\SearchRequest.php
        $result = $this->repository->search($request->get("searchQuery"));
        // Если во время выполнения кода при работе с БД возникнет Exception он будет обработан app\Exceptions\Handler.php
        // Так как проект напичканный конструкциями try catch, с моей точки зрения, в большинстве случаев является не совсем верным решением
        // Суть в том, что в подобных случаях нет никакой надобности отлавливать исключение в контроллере. Просто можно дать ему всплыть и обработать его в app\Exceptions\Handler.php

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
                "departureDateTime" => Carbon::parse($obj->departure_at, $obj->departure_timezone)->format("Y-m-d H:i"),
                "arrivalDateTime" => Carbon::parse($obj->arrival_at, $obj->arrival_timezone)->format("Y-m-d H:i"),
                "duration" => Carbon::parse($obj->departure_at, $obj->departure_timezone)->diffInMinutes(Carbon::parse($obj->arrival_at, $obj->arrival_timezone)),
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
