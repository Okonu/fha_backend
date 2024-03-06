<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Registration\Founder;
use App\Models\Registration\Investor;
use App\Models\Registration\Professional;
use App\Models\User;
use App\Policies\FounderPolicy;
use App\Policies\InvestorPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProfessionalPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Permission::class =>PermissionPolicy::class,
        Founder::class => FounderPolicy::class,
        Professional::class =>ProfessionalPolicy::class,
        Investor::class =>InvestorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });
    }
}
