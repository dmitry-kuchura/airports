<?php


namespace App\Http\Controllers\Api;


class AirportsController
{
    public function list()
    {
        return response()->json([
            [
                "id" => "IEV",
                "text" => "Zhulyany Airport",
                "city" => "Kiev",
                "country" => "Ukraine"
            ],
            [
                "id" => "KBP",
                "text" => "Borispol Airport",
                "city" => "Kiev",
                "country" => "Ukraine",
            ]
        ], 200, [], JSON_NUMERIC_CHECK);
    }
}
