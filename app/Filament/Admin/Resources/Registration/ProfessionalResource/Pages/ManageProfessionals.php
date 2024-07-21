<?php

namespace App\Filament\Admin\Resources\Registration\ProfessionalResource\Pages;

use App\Filament\Admin\Resources\Registration\ProfessionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProfessionals extends ManageRecords
{
    protected static string $resource = ProfessionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
