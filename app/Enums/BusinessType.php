<?php

namespace App\Enums;

enum BusinessType : string
{
    case STARTUP = "Startup";
    case CONSULTANT = "Consultant/freelancer";
    case SME = "Small to Medium Enterprise, (SME)";
    case ESTABLISHED_COMPANY = "Established Company";
}
