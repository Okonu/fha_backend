<?php

namespace App\Enums;

enum SocialEnvironmentImpact :string
{
    case VERY_IMPORTANT = "Very Important";
    case IMPORTANT_BUT_NOT_PRIMARY_FOCUS = "Important but not a primary focus";
    case NOT_SIGNIFICANT = "Not significant in my investment decisions";
}
