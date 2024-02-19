<?php

namespace App\Enums;

enum FundingStatus : string
{
    case ACTIVELY_SEEKING_FUNDING = "actively seeking funding";
    case CONSIDERING_SEEKING_FUNDING = "considering seeking funding in the future";
    case NOT_CURRENTLY_SEEKING_FUNDING = "not currently seeking funding";
    case ALREADY_SECURED_FUNDING = "already secured funding";
}
