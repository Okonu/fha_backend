<?php

namespace App\Filament\Resources\Registration\FounderResource\Pages;

use App\Filament\Resources\Registration\FounderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFounder extends ViewRecord
{
    protected static string $resource = FounderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
