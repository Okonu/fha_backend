<?php

namespace App\Policies;

use App\Models\Registration\Professional;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfessionalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole('manager', 'admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Professional $professional): bool
    {
        return $user->hasAnyRole('manager', 'admin');
    }

}
