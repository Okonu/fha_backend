<?php

namespace App\Enums;

enum FinancialLevel : string
{
    case PRE_REVENUE = "Pre-revenues: Not yet generating revenue";
    case NO_APPLICABLE = "Non-Profit-Organization";
    case GROWING = "Generating revenue and profitable";
    case ESTABLISHED = "Consistently profitable and scaling";
    case EARLY_STAGE = "Generating revenue, but not yet profitable";
}
