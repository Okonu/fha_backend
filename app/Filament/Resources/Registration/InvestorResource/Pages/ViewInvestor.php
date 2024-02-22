<?php

namespace App\Filament\Resources\Registration\InvestorResource\Pages;

use App\Filament\Resources\Registration\InvestorResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInvestor extends ViewRecord
{
    protected static string $resource = InvestorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
