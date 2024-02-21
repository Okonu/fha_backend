<?php

namespace App\Models\Registration;

use App\Enums\CoInvesting;
use App\Enums\ConvenientInvestment;
use App\Enums\EnterpriseLevel;
use App\Enums\InvestorFocusArea;
use App\Enums\SocialEnvironmentaImpact;
use App\Enums\ViabilityCriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorDetail extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'enterprise_level', 'co_investing', 'convenient_investing', 'focus_area', 'impact', 'viability', 'expectation', 'concern'];

    protected $casts = [
        'enterprise_level' => EnterpriseLevel::class,
        'co_investing' => CoInvesting::class,
        'convenient_investing' => ConvenientInvestment::class,
        'focus_area' => InvestorFocusArea::class,
        'impact' => SocialEnvironmentaImpact::class,
        'viability' => ViabilityCriteria::class,
    ];

    public function founder()
    {
        return $this->belongsTo(Investor::class);
    }
}
