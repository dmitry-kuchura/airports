<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return $this->handleApiException($request, $exception);
    }

    /**
     * Return API response
     *
     * @param $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function apiResponse($exception)
    {
        if (method_exists($exception, "getStatusCode")) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        switch ($statusCode) {
            case 401:
                $response["message"] = "Unauthorized";
                break;
            case 403:
                $response["message"] = "Forbidden";
                break;
            case 404:
                $response["message"] = "Not Found";
                break;
            case 405:
                $response["message"] = "Method Not Allowed";
                break;
            case 422:
                $response["message"] = $exception->original["message"];
                $response["errors"] = $exception->original["errors"];
                break;
            default:
                $response["message"] = ($statusCode == 500) ? "Whoops, looks like something went wrong" : $exception->getMessage();
                break;
        }

        if (config("app.debug")) {
            $response["trace"] = $exception->getTrace();
            $response["code"] = $exception->getCode();
        }

        $response["status"] = $statusCode;

        return response()->json($response, $statusCode);
    }

    /**
     * Handle and store Exception fo debug
     *
     * @param $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function handleApiException($request, Exception $exception)
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
            $exception = $exception->getResponse();
        }

        Log::error($exception);

        return $this->apiResponse($exception);
    }
}
