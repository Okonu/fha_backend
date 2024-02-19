<?php

namespace App\Enums;

enum BusinessType : string
{
    case STARTUP = "startup";
    case CONSULTANT = "consultant/freelancer";
    case SME = "small to medium enterprise";
    case ESTABLISHED_COMPANY = "established company";
}
