<?php

namespace App\Enums;

enum SocialEnvironmentaImpact :string
{
    case VERY_IMPORTANT = "very important";
    case IMPORTANT_BUT_NOT_PRIMARY_FOCUS = "important but not a primary focus";
    case NOT_SIGNIFICANT = "not significant in my investment decisions";
}
