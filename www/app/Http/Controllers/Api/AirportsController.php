<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AirportsException;
use App\Http\Controllers\Controller;
use App\Repositories\AirportsRepository;
use Exception;

class AirportsController extends Controller
{
    protected $repository;

    public function __construct(AirportsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        $result = [];

        $query = $this->repository->list();

        foreach ($query as $obj) {
            $result[] = [
                "id" => $obj->key,
                "text" => $obj->name . " (" . $obj->city . ", " . $obj->country . ")",
                "city" => $obj->city,
                "country" => $obj->country
            ];
        }

        return $this->returnResponse($result, $this->success);
    }
}
