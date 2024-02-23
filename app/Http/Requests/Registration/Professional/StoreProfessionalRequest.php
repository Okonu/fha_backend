<?php

namespace App\Http\Requests\Registration\Professional;

use App\Enums\Aspirations;
use App\Enums\CollaborationTypes;
use App\Enums\EnhancingCredibility;
use App\Enums\FocusAreas;
use App\Enums\Goals;
use App\Enums\MembershipBenefits;
use App\Enums\Motivation;
use App\Enums\SkillImportance;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreProfessionalRequest extends FormRequest
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
            'email' => 'required|email|unique:professionals,email',
            'motivation' => ['required', 'string', new Enum(Motivation::class)],
            'credibility_enhancement' => ['required', 'string', new Enum(EnhancingCredibility::class)],
            'interests' => ['required', 'string', new Enum(FocusAreas::class)],
            'skills' => 'required|string|max:255',
            'benefits' => ['required', 'string', new Enum(MembershipBenefits::class)],
            'collaboration_engagement' => ['required', 'string', new Enum(CollaborationTypes::class)],
            'aspirations' => ['required', 'string', new Enum(Aspirations::class)],
            'contributions' => 'required|string|max:255',
            'skill_importance' => ['required', 'string', new Enum(SkillImportance::class)],
            'goals' => ['required', 'string', new Enum(Goals::class)],
        ];
    }
}
