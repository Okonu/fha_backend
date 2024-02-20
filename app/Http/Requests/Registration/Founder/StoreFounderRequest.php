<?php

namespace App\Http\Requests\Registration\Founder;

use App\Enums\BusinessType;
use App\Enums\FinancialLevel;
use App\Enums\FocusAreas;
use App\Enums\FundingStatus;
use App\Enums\PartneringOption;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreFounderRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:founders,email',
            // 'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'financial_level' => 'required|string|max:255',
            'focus_area' => 'required|string|max:255',
            'challenges' => 'required|string|max:255',
            'funding_status' => 'required|string|max:255',
            'partnership' => 'required|string|max:255',
            'community_support' => 'required|string|max:255',
        ];
    }
}
