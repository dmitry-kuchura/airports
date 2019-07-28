<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\AirportsRepository;

class AirportsController extends Controller
{
    protected $repository;

    public function __construct(AirportsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        // В случае если результат будет отсутсвовать после запроса вернется пустой массив
        $result = [];

        // В случае если запрос будет содержать ошибку либо будет отсутсвовать таблица
        // наш Exception будет обработан в главном Exception handle файле app\Exceptions\Handler.php
        $query = $this->repository->list();

        // формируем ответ для возврата
        foreach ($query as $obj) {
            $result[] = [
                "id" => $obj->key,
                "text" => $obj->name . " (" . $obj->city . ", " . $obj->country . ")",
                "city" => $obj->city,
                "country" => $obj->country
            ];
        }

        return $this->returnResponse($result, Response::HTTP_OK);
    }
}
