<?php

use App\Http\Controllers\API\Login\FounderLoginAPIController;
use App\Http\Controllers\API\Login\InvestorLoginAPIController;
use App\Http\Controllers\API\Registration\FounderAPIController;
use App\Http\Controllers\API\Registration\InvestorAPIController;
use App\Http\Controllers\API\FoundersAPIController;
use App\Http\Controllers\API\InvestorsAPIController;
use App\Http\Controllers\API\EnumAPIController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\API\Registration\ProfessionalAPIController;
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
Route::get('/founders', [FoundersAPIController::class, 'index']);
Route::post('/register-founder', [FounderAPIController::class, 'founderRegistration']);
Route::post('/founder-login', [FounderLoginAPIController::class, 'authenticate']);
Route::post('/founder-request-otp', [FounderLoginAPIController::class, 'requestOtp']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [FounderLoginAPIController::class, 'logout']);
});

// investor routes
Route::get('/investors', [InvestorsAPIController::class, 'index']);
Route::post('/register-investor', [InvestorAPIController::class, 'investorRegistration']);
Route::post('/investor-login', [InvestorLoginAPIController::class, 'authenticate']);
Route::post('/investor-request-otp', [InvestorLoginAPIController::class, 'requestOtp']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/investor-logout', [InvestorLoginAPIController::class, 'logout']);
});

//professional routes
Route::post('/register-professional', [ProfessionalAPIController::class, 'professionalRegistration']);

//enum routes
Route::prefix('enums')->group(function () {
    Route::get('/focus-areas', [EnumAPIController::class, 'getFocusAreas']);
    Route::get('/social-env-impacts', [EnumAPIController::class, 'getSocialEnvironmentImpact']);
    Route::get('/investor-focus-areas', [EnumAPIController::class, 'getInvestorFocusAreas']);
    Route::get('/viability-criterias', [EnumAPIController::class, 'getViabilityCriteria']);
    Route::get('/business-types', [EnumAPIController::class, 'getBusinessType']);
    Route::get('/funding-status', [EnumAPIController::class, 'getFundingStatus']);
    Route::get('/partnering-options', [EnumAPIController::class, 'getPartneringOptions']);
    Route::get('/financial-levels', [EnumAPIController::class, 'getFinancialLevels']);
    Route::get('/co-investings', [EnumAPIController::class, 'getCoInvestings']);
    Route::get('/convenient-investments', [EnumAPIController::class, 'getConvenientInvestments']);
    Route::get('/enterprise-levels', [EnumAPIController::class, 'getEnterpriseLevels']);
    Route::get('/skill-importance-options', [EnumAPIController::class, 'getSkillImportance']);
    Route::get('/membership-benefits', [EnumAPIController::class, 'getMembershipBenefits']);
    Route::get('/collaboration-types', [EnumAPIController::class, 'getCollaborationTypes']);
    Route::get('/aspirations', [EnumAPIController::class, 'getAspirations']);
    Route::get('/goals', [EnumAPIController::class, 'getGoals']);
    Route::get('/motivations', [EnumAPIController::class, 'getMotivation']);
    Route::get('/enhancing-credibility', [EnumAPIController::class, 'getEnhancingCredibility']);
});

//payment callback
Route::post('/payment-callback', [PaymentsController::class, 'handleCallback']);