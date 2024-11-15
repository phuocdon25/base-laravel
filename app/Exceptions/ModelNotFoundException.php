<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ModelNotFoundException extends Exception
{
    public $message;

    /**
     * GeneralException constructor.
     *
     * @param  string  $message
     * @param  int  $code
     */
    public function __construct($message = '', $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        $response = [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'type' => 'ModelNotFoundException',
        ];

        return response()->json(['error' => $response], $exception->getCode());
    }
}
