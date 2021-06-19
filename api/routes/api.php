<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Auth\LoginController;

Route::prefix('auth')->group(function () {
    Route::post('authenticate', [LoginController::class, 'authenticate']);
    Route::post('register', [LoginController::class, 'register']);
    Route::post('revoke', [LoginController::class, 'revoke'])->middleware('auth:sanctum');
});
