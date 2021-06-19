<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Authenticate a user
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(LoginRequest $request): JsonResponse
    {

        if (!auth()->attempt($request->validated())) {
            return response()->json(['message' => __('auth.failed')], 401);
        }

        $token = auth()->user()->createToken('token');

        return response()->json(['user' => auth()->user(), 'token' => $token->plainTextToken], 201);
    }

    /**
     * Log out user by revoking their token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function revoke(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => __('auth.logout')], 201);
    }
}
