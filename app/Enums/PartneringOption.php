<?php

namespace App\Enums;

enum PartneringOption : string
{
    case OPEN_TO_PARTNERSHIPS = "Yes, I am open to partnership";
    case NOT_OPEN_TO_PARTNERSHIPS = "Not open to partnership";
    case WOULD_CONSIDER = "I would consider, but I need more information";
}
