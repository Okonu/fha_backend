<?php

namespace App\Enums;

enum FinancialLevel : string
{
    case PRE_REVENUE = "pre-revenues: not yet generating revenue";
    case NO_APPLICABLE = "non-profit-organization";
    case GROWING = "generating revenue and profitable";
    case ESTABLISHED = "consistently profitable and scaling";
    case EARLY_STAGE = " generating revenue, but not yet profitable";
}
