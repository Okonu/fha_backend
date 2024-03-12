<?php

namespace App\Policies;

use App\Models\Registration\Investor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InvestorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin', 'manager');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Investor $investor): bool
    {
        return $user->hasRole('admin', 'manager');
    }

}
