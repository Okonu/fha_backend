<?php

namespace App\Http\Requests\Registration\Investor;

use App\Enums\CoInvesting;
use App\Enums\EnterpriseLevel;
use App\Enums\InvestorFocusArea;
use App\Enums\SocialEnvironmentaImpact;
use App\Enums\ViabilityCriteria;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvestorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|string|max:255|unique:investors,email',
            'enterprise_level' => ['required', EnterpriseLevel::class],
            'co_investing' => ['required', CoInvesting::class],
            'focus_area' => ['required', InvestorFocusArea::class],
            'impact' => ['required', SocialEnvironmentaImpact::class],
            'viability' => ['required', ViabilityCriteria::class],
            'expectation' => 'required|string|max:255',
            'concern' => 'required|string|max:255',
        ];
    }
}
