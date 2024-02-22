<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Enums\FocusAreas;
use App\Enums\BusinessType;
use App\Enums\FinancialLevel;
use App\Enums\FundingStatus;
use App\Enums\PartneringOption;
use App\Enums\EnterpriseLevel;
use App\Enums\ViabilityCriteria;
use App\Enums\CoInvesting;
use App\Enums\ConvenientInvestment;
use App\Enums\SocialEnvironmentImpact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnumAPIController extends Controller
{
    public function getFocusAreas(): JsonResponse
    {
        $focusAreas = FocusAreas::cases();
        $focusAreasArray = [];

        foreach ($focusAreas as $focusArea) {
            $focusAreasArray[] = $focusArea->value;
        }

        return response()->json($focusAreasArray);
    }

    public function getSocialEnvironmentImpact(): JsonResponse
    {
        $socialEnvironmentImpact = SocialEnvironmentaImpact::cases();
        $socialEnvironmentImpactArray = [];

        foreach ($socialEnvironmentImpact as $socialEnvironmentImpact) {
            $socialEnvironmentImpactArray[] = $socialEnvironmentImpact->value;
        }

        return response()->json($socialEnvironmentImpactArray);
    }

    public function getInvestorFocusAreas(): JsonResponse
    {
        $investorFocusAreas = InvestorFocusArea::cases();
        $investorFocusAreasArray = [];

        foreach ($investorFocusAreas as $investorFocusArea) {
            $investorFocusAreasArray[] = $investorFocusArea->value;
        }

        return response()->json($investorFocusAreasArray);
    }

    public function getViabilityCriteria(): JsonResponse
    {
        $viabilityCriteria = ViabilityCriteria::cases();
        $viabilityCriteriaArray = [];

        foreach ($viabilityCriteria as $viabilityCriteria) {
            $viabilityCriteriaArray[] = $viabilityCriteria->value;
        }

        return response()->json($viabilityCriteriaArray);
    }

    public function getBusinessType() : JsonResponse
    {
        $busnessTypes = BusinessType::cases();
        $busnessTypesArray = [];

        foreach ($busnessTypes as $busnessType) {
            $busnessTypesArray[] = $busnessType->value;
        }

        return response()->json($busnessTypesArray);
    }

    public function getFundingStatus(): JsonResponse
    {
        $fundingStatus = FundingStatus::cases();
        $fundingStatusArray = [];

        foreach ($fundingStatus as $fundingStatus) {
            $fundingStatusArray[] = $fundingStatus->value;
        }

        return response()->json($fundingStatusArray);
    }

    public function getPartneringOptions(): JsonResponse
    {
        $partneringOptions = PartneringOption::cases();
        $partneringOptionsArray = [];

        foreach ($partneringOptions as $partneringOptions) {
            $partneringOptionsArray[] = $partneringOptions->value;
        }

        return response()->json($partneringOptionsArray);
    }

    public function getFinancialLevels(): JsonResponse
    {
        $financialLevels = FinancialLevel::cases();
        $financialLevelsArray = [];

        foreach ($financialLevels as $financialLevels) {
            $financialLevelsArray[] = $financialLevels->value;
        }

        return response()->json($financialLevelsArray);
    }

    public function getCoInvestings(): JsonResponse
    {
        $coInvestings = CoInvesting::cases();
        $coInvestingsArray = [];

        foreach ($coInvestings as $coInvestings) {
            $coInvestingsArray[] = $coInvestings->value;
        }

        return response()->json($coInvestingsArray);
    }

    public function getConvenientInvestments(): JsonResponse
    {
        $convenientInvestments = ConvenientInvestment::cases();
        $convenientInvestmentsArray = [];

        foreach ($convenientInvestments as $convenientInvestments) {
            $convenientInvestmentsArray[] = $convenientInvestments->value;
        }

        return response()->json($convenientInvestmentsArray);
    }

    public function getEnterpriseLevels(): JsonResponse
    {
        $enterpriseLevels = EnterpriseLevel::cases();
        $enterpriseLevelsArray = [];

        foreach ($enterpriseLevels as $enterpriseLevels) {
            $enterpriseLevelsArray[] = $enterpriseLevels->value;
        }

        return response()->json($enterpriseLevelsArray);
    }
}
