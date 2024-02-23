<?php

namespace App\Models\Registration;

use App\Enums\Aspirations;
use App\Enums\CollaborationTypes;
use App\Enums\EnhancingCredibility;
use App\Enums\FocusAreas;
use App\Enums\Goals;
use App\Enums\MembershipBenefits;
use App\Enums\Motivation;
use App\Enums\SkillImportance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDetail extends Model
{
    use HasFactory;

    protected $fillable = ['professional_id', 'motivation', 'credibility_enhancement', 'interests', 'skills', 'benefits', 'collaboration_engagement', 'aspirations', 'contributions', 'skill_importance', 'goals' ];

    protected $casts = [
        'motivation' => Motivation::class,
        'credibility_enhancement' => EnhancingCredibility::class,
        'interests' => FocusAreas::class,
        'benefits' => MembershipBenefits::class,
        'collaboration_engagement' => CollaborationTypes::class,
        'aspirations' => Aspirations::class,
        'skill_importance' => SkillImportance::class,
        'goals' => Goals::class,
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}
