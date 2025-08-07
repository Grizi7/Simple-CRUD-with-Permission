<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;

class AuthController extends Controller
{
    use ResponseTrait;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $result = $this->service->register($request->validated());
            return $this->returnSuccessResponse($result, 'User registered successfully');
        } catch (Exception $e) {
            return $this->returnErrorResponse(null, $e->getMessage(), 500);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $result = $this->service->login($request->validated());
            return $this->returnSuccessResponse($result, 'Login successful');
        } catch (Exception $e) {
            return $this->returnErrorResponse(null, $e->getMessage(), 401);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $this->service->logout($request->user());
            return $this->returnSuccessResponse(null, 'Logged out successfully');
        } catch (Exception $e) {
            return $this->returnErrorResponse(null, $e->getMessage(), 500);
        }
    }
}
