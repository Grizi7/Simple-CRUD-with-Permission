<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait ResponseTrait
{
    public function returnSuccessResponse($data, $message = 'Success', $code = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function returnErrorResponse($errors, $message = 'Error', $code = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], $code);
    }

    public function respondWithCollection($collection, $message = 'data retrieved successfully', $modelResource): AnonymousResourceCollection
    {
        return forward_static_call([$modelResource, 'collection'], $collection)->additional([
            'status' => true,
            'message' => $message
        ]);
    }
    public function respondWithResource($resource, $message = 'data retrieved successfully', $modelResource): JsonResource
    {
        return forward_static_call([$modelResource, 'make'], $resource)->additional([
            'status' => true,
            'message' => $message
        ]);
    }
}
