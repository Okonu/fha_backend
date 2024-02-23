<?php

namespace App\Enums;

enum PartneringOption : string
{
    case OPEN_TO_PARTNERSHIPS = "Yes, I am open to partniship";
    case NOT_OPEN_TO_PARTNERSHIPS = "Not open to partniship";
    case WOULD_CONSIDER = "I would consider, but I need more information";
}
