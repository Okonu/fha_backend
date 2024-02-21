<?php

namespace App\Enums;

enum CoInvesting : string
{
    case YES_I_AM_OPEN_TO_CO_INVESTING = "i am open to co-investing";
    case I_PREFER_TO_INVEST_INDEPENDENTLY = "i prefer to invest independently";
    case I_AM_UNSURE_AT_THIS_TIME =  "i am not sure at this time";
}
