<?php

use App\Http\Controllers\API\Login\FounderLoginAPIController;
use App\Http\Controllers\API\Registration\FounderAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-founder', [FounderAPIController::class, 'founderRegistration']);
Route::post('/login', [FounderLoginAPIController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [FounderLoginAPIController::class, 'logout']);
    Route::post('/reset-password', [FounderLoginAPIController::class, 'resetPassword']);
});
