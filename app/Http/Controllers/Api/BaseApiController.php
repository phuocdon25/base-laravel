<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BaseApiController extends Controller
{
    private function respond(array $data, $status = Response::HTTP_OK, $headers = [])
    {
        return response()->json($data, $status, $headers);
    }

    public function responseWithSuccess(array $data = [], int $status = Response::HTTP_OK, array $headers = [])
    {
        return $this->respond($data, $status, $headers);
    }

    public function responseWithError(array $data = [], int $status = Response::HTTP_INTERNAL_SERVER_ERROR, array $headers = [])
    {
        return $this->respond($data, $status, $headers);
    }
}