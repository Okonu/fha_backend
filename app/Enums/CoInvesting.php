<?php

namespace App\Enums;

enum CoInvesting : string
{
    case YES_I_AM_OPEN_TO_CO_INVESTING = "I am open to co-investing";
    case I_PREFER_TO_INVEST_INDEPENDENTLY = "I prefer to invest independently";
    case I_AM_UNSURE_AT_THIS_TIME =  "I am not sure at this time";
}
