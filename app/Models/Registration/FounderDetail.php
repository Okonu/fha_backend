<?php

namespace App\Models\Registration;

use App\Enums\BusinessType;
use App\Enums\FinancialLevel;
use App\Enums\FocusAreas;
use App\Enums\FundingStatus;
use App\Enums\PartneringOption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FounderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['founder_id', 'company_name', 'business_type', 'financial_level', 'focus_area', 'challenges', 'funding_status', 'partnership', 'community_support'];

    protected $casts = [
        'business_type' => BusinessType::class,
        'financial_level' => FinancialLevel::class,
        'focus_area' => FocusAreas::class,
        'funding_status' => FundingStatus::class,
        'partnership' => PartneringOption::class,
    ];

    public function founder()
    {
        return $this->belongsTo(Founder::class);
    }
}
