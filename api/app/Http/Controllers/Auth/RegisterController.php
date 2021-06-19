<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * Register new user
     *
     * @param \App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($request->password);

        $user = User::create($validated);

        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 201);
    }
}
