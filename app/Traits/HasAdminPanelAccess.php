<?php

namespace App\Traits;

use App\Models\Admin;
use Filament\Panel;
use Illuminate\Support\Facades\Auth;

trait HasAdminPanelAccess
{
    public function canAccessPanel(Panel $panel): bool
    {
        $user = Auth::user();

        return $user->admin !== null && $user->isActiveAdmin();
    }
}
