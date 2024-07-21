<?php

namespace App\Filament\Admin\Resources\Registration\FounderResource\Pages;

use App\Filament\Admin\Resources\Registration\FounderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFounder extends EditRecord
{
    protected static string $resource = FounderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
