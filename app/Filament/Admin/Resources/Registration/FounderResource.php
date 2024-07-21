<?php

namespace App\Filament\Admin\Resources\Registration;

use App\Filament\Resources\Registration\FounderResource\Pages;
use App\Filament\Resources\Registration\FounderResource\RelationManagers;
use App\Models\Registration\Founder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FounderResource extends Resource
{
    protected static ?string $model = Founder::class;

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
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('detail.company_name')
                    ->label('Company Name'),
                TextColumn::make('detail.business_type')
                    ->label('Business Type'),
                TextColumn::make('detail.financial_level')
                    ->label('Financial Level'),
                TextColumn::make('detail.focus_area')
                    ->label('Focus Area'),
                TextColumn::make('detail.challenges')
                    ->label('Challenges'),
                TextColumn::make('detail.funding_status')
                    ->label('Funding Status'),
                TextColumn::make('detail.partnership')
                    ->label('Partnership'),
                TextColumn::make('detail.community_support')
                ->label('Community Support'),
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
            'index' => \App\Filament\Admin\Resources\Registration\FounderResource\Pages\ListFounders::route('/'),
            'create' => \App\Filament\Admin\Resources\Registration\FounderResource\Pages\CreateFounder::route('/create'),
            'view' => \App\Filament\Admin\Resources\Registration\FounderResource\Pages\ViewFounder::route('/{record}'),
            'edit' => \App\Filament\Admin\Resources\Registration\FounderResource\Pages\EditFounder::route('/{record}/edit'),
        ];
    }
}
