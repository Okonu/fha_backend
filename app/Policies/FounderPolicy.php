<?php

namespace App\Policies;

use App\Models\Registration\Founder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FounderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['manager', 'admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Founder $founder): bool
    {
        return $user->hasRole('manager', 'admin');
    }

}
