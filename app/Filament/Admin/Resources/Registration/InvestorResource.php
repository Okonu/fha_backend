<?php

namespace App\Filament\Admin\Resources\Registration;

use App\Filament\Resources\Registration\InvestorResource\Pages;
use App\Filament\Resources\Registration\InvestorResource\RelationManagers;
use App\Models\Registration\Investor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('investorDetail.enterprise_level')
                    ->label('Enterprise Level'),
                TextColumn::make('investorDetail.co_investing')
                    ->label('Co-Investing')
                    ->searchable(),
                TextColumn::make('investorDetail.convenient_investing')
                    ->label('Convenient Investing')
                    ->searchable(),
                TextColumn::make('investorDetail.focus_area')
                    ->label('Focus Area')
                    ->searchable(),
                TextColumn::make('investorDetail.impact')
                    ->label('Impact')
                    ->searchable(),
                TextColumn::make('investorDetail.viability')
                    ->label('Viability')
                    ->searchable(),
                TextColumn::make('investorDetail.expectation')
                    ->label('Expectation')
                    ->searchable(),
                TextColumn::make('investorDetail.concern')
                    ->label('Concern')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\Registration\InvestorResource\Pages\ListInvestors::route('/'),
            'create' => \App\Filament\Admin\Resources\Registration\InvestorResource\Pages\CreateInvestor::route('/create'),
            'view' => \App\Filament\Admin\Resources\Registration\InvestorResource\Pages\ViewInvestor::route('/{record}'),
            'edit' => \App\Filament\Admin\Resources\Registration\InvestorResource\Pages\EditInvestor::route('/{record}/edit'),
        ];
    }
}
