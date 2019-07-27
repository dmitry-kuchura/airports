<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $success = Response::HTTP_OK;

    public $badRequest = Response::HTTP_BAD_REQUEST;

    public function returnResponse(array $response, $statusCode, array $headers = [])
    {
        return response()->json($response, $statusCode, $headers, JSON_NUMERIC_CHECK);
    }
}
