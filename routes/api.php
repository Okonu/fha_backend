<?php

use App\Http\Controllers\API\Login\FounderLoginAPIController;
use App\Http\Controllers\API\Login\InvestorLoginAPIController;
use App\Http\Controllers\API\Registration\FounderAPIController;
use App\Http\Controllers\API\Registration\InvestorAPIController;
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

//founder routes
Route::post('/register-founder', [FounderAPIController::class, 'founderRegistration']);
Route::post('/founder-login', [FounderLoginAPIController::class, 'authenticate']);
Route::post('/founder-request-otp', [FounderLoginAPIController::class, 'requestOtp']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [FounderLoginAPIController::class, 'logout']);
});

// investor routes
Route::post('/register-investor', [InvestorAPIController::class, 'investorRegistration']);
Route::post('/investor-login', [InvestorLoginAPIController::class, 'authenticate']);
Route::post('/investor-request-otp', [InvestorLoginAPIController::class, 'requestOtp']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/investor-logout', [InvestorLoginAPIController::class, 'logout']);
});