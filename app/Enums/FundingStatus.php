<?php

namespace App\Enums;

enum FundingStatus : string
{
    case ACTIVELY_SEEKING_FUNDING = "Actively seeking funding";
    case CONSIDERING_SEEKING_FUNDING = "Considering seeking funding in the future";
    case NOT_CURRENTLY_SEEKING_FUNDING = "Not currently seeking funding";
    case ALREADY_SECURED_FUNDING = "Already secured funding";
}
