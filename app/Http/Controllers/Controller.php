<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function success($data = [], $message = '')
    {
        $response = [
            'status' => 'success',
            'data' => $data
        ];

        if ($message) {
            $response['message'] = $message;
        }

        return response()->json($response, Response::HTTP_OK);
    }

    protected function error($message = '')
    {
        $response = [
            'status' => 'error',
            'message' => $message
        ];

        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
