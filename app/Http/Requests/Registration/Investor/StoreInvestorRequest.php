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
            'enterprise_level' => 'required|string|max:255',
            'co_investing' => 'required|string|max:255',
            'convenient_investing' => 'required|string|max:255',
            'focus_area' => 'required|string|max:255',
            'impact' => 'required|string|max:255',
            'viability' =>  'required|string|max:255',
            'expectation' => 'required|string|max:255',
            'concern' => 'required|string|max:255',
        ];
    }
}
