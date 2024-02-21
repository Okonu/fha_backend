<?php

namespace App\Filament\Resources\Registration\InvestorResource\Pages;

use App\Filament\Resources\Registration\InvestorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInvestors extends ListRecords
{
    protected static string $resource = InvestorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
