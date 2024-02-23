<?php

namespace App\Http\Controllers\API;

use App\Enums\Aspirations;
use App\Enums\EnhancingCredibility;
use App\Enums\MembershipBenefits;
use App\Enums\Motivation;
use App\Enums\SkillImportance;
use App\Http\Controllers\Controller;
use App\Enums\FocusAreas;
use App\Enums\BusinessType;
use App\Enums\FinancialLevel;
use App\Enums\FundingStatus;
use App\Enums\PartneringOption;
use App\Enums\EnterpriseLevel;
use App\Enums\ViabilityCriteria;
use App\Enums\CoInvesting;
use App\Enums\CollaborationTypes;
use App\Enums\ConvenientInvestment;
use App\Enums\Goals;
use App\Enums\InvestorFocusArea;
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
        $socialEnvironmentImpact = SocialEnvironmentImpact::cases();
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

    public function getAspirations(): JsonResponse
    {
        $aspirations = Aspirations::cases();
        $aspirationsArray = [];

        foreach ($aspirations as $aspirations) {
            $aspirationsArray[] = $aspirations->value;
        }

        return response()->json($aspirationsArray);
    }

    public function getCollaborationTypes(): JsonResponse
    {
        $collaborationTypes = CollaborationTypes::cases();
        $collaborationTypesArray = [];

        foreach ($collaborationTypes as $collaborationTypes) {
            $collaborationTypesArray[] = $collaborationTypes->value;
        }

        return response()->json($collaborationTypesArray);
    }

    public function getMembershipBenefits(): JsonResponse
    {
        $membershipBenefits = MembershipBenefits::cases();
        $membershipBenefitsArray = [];

        foreach ($membershipBenefits as $membershipBenefit) {
            $membershipBenefitsArray[] = $membershipBenefit->value;
        }

        return response()->json($membershipBenefitsArray);
    }
    public function getSkillImportance(): JsonResponse
    {
        $skillImportance = SkillImportance::cases();
        $skillImportanceArray = [];

        foreach ($skillImportance as $skillImportance) {
            $skillImportanceArray[] = $skillImportance->value;
        }

        return response()->json($skillImportanceArray);
    }

    public function getGoals(): JsonResponse
    {
        $goals = Goals::cases();
        $goalsArray = [];

        foreach ($goals as $goal) {
            $goalsArray[] = $goal->value;
        }

        return response()->json($goalsArray);
    }

    public function getMotivation(): JsonResponse
    {
        $motivation = Motivation::cases();
        $motivationArray = [];

        foreach ($motivation as $motivation) {
            $motivationArray[] = $motivation->value;
        }

        return response()->json($motivationArray);
    }

    public function getEnhancingCredibility() : JsonResponse
    {
        $enhancingCredibility = EnhancingCredibility::cases();
        $enhancingCredibilityArray = [];

        foreach ($enhancingCredibility as $enhancingCredibility) {
            $enhancingCredibilityArray[] = $enhancingCredibility->value;
        }

        return response()->json($enhancingCredibilityArray);
    }
}
