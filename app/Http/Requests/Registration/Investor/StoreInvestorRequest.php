<?php

namespace App\Http\Requests\Registration\Investor;

use App\Enums\CoInvesting;
use App\Enums\ConvenientInvestment;
use App\Enums\EnterpriseLevel;
use App\Enums\InvestorFocusArea;
use App\Enums\SocialEnvironmentImpact;
use App\Enums\ViabilityCriteria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'enterprise_level' => ['required', 'string', new Enum(EnterpriseLevel::class)],
            'co_investing' => ['required','string', new Enum(CoInvesting::class)],
            'convenient_investing' => ['required', 'string', new Enum(ConvenientInvestment::class)],
            'focus_area' => ['required', 'string', new Enum(InvestorFocusArea::class) ],
            'impact' => ['required', 'string', new Enum(SocialEnvironmentImpact::class) ],
            'viability' =>  ['required', 'string', new Enum(ViabilityCriteria::class) ],
            'expectation' => 'required|string|max:255',
            'concern' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^(\+254)?(07|01)\d{8}$/',
        ];
    }
}
