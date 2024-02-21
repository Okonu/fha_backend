<?php

namespace App\Filament\Resources\Registration\InvestorResource\Pages;

use App\Filament\Resources\Registration\InvestorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvestor extends EditRecord
{
    protected static string $resource = InvestorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
