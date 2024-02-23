<?php

namespace App\Enums;

enum CollaborationTypes : string
{
    case ATTENDING_NETWORKING_EVENTS = "Attending networking events";
    case JOINING_SPECIAL_INTEREST_GROUPS = "Joining special interest groups";
    case COLLABORATING_ON_TECH_PROJECTS = "Collaborating on Tech Projects";
    case MONITORING_EMERGING_TALENT = "Monitoring emerging talent";
}
