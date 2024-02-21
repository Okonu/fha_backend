<?php

namespace App\Filament\Resources\Registration;

use App\Filament\Resources\Registration\InvestorResource\Pages;
use App\Filament\Resources\Registration\InvestorResource\RelationManagers;
use App\Models\Registration\Investor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

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
            'index' => Pages\ListInvestors::route('/'),
            'create' => Pages\CreateInvestor::route('/create'),
            'view' => Pages\ViewInvestor::route('/{record}'),
            'edit' => Pages\EditInvestor::route('/{record}/edit'),
        ];
    }
}
