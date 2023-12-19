<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait Responsive
{
    /**
     * Send a success response to client
     *
     * @param static::SUCCESS $status
     * @param array $data
     * @param \Illuminate\Http\Response::HTTP_OK
     *
     * @return \Illuminate\Http\Response
     */
    private function successResponse($data = [], $statusCode = Response::HTTP_OK): Response
    {
        return response()->json([
            'status' => 'Success',
            'data' => $data
        ], $statusCode);
    }

    /**
     * Send a success response to client
     *
     * @param static::ERROR $status
     * @param string $message
     * @param \Illuminate\Http\Response::HTTP_BAD_REQUEST
     *
     * @return \Illuminate\Http\Response
     */
    private function errorResponse($message = 'Some Error occured', $statusCode = Response::HTTP_BAD_REQUEST): Response
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
        ], $statusCode);
    }
}
