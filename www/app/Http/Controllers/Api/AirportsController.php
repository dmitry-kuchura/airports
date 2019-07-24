<?php

namespace App\Http\Controllers\Api;

use App\Repositories\AirportsRepository;

class AirportsController
{
    protected $repository;

    public function __construct(AirportsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $query = $this->repository->list();

        $result = [];

        foreach ($query as $obj) {
            $result[] = [
                "id" => $obj->key,
                "text" => $obj->name,
                "city" => $obj->city,
                "country" => $obj->country
            ];
        }

        return response()->json($result, 200, [], JSON_NUMERIC_CHECK);
    }
}
