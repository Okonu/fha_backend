<?php

namespace App\Filament\Resources\Registration;

use App\Filament\Resources\Registration\ProfessionalResource\Pages;
use App\Filament\Resources\Registration\ProfessionalResource\RelationManagers;
use App\Models\Registration\Professional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class ProfessionalResource extends Resource
{
    protected static ?string $model = Professional::class;

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
                TextColumn::make('professionalDetail.motivation')
                    ->label('Motivation'),
                TextColumn::make('professionalDetail.credibility_enhancement')
                    ->label('Credibility Enhancement')
                    ->searchable(),
                TextColumn::make('professionalDetail.interests')
                    ->label('Convenient Investing')
                    ->searchable(),
                TextColumn::make('skills')
                    ->searchable(),
                TextColumn::make('professionalDetail.benefits')
                    ->label('Benefits')
                    ->searchable(),
                TextColumn::make('professionalDetail.collaboration_engagement')
                    ->label('Collaboration Engagement')
                    ->searchable(),
                TextColumn::make('professionalDetail.aspirations')
                    ->label('Aspirations')
                    ->searchable(),
                TextColumn::make('professionalDetail.skill_importance')
                    ->label('Skill Importance')
                    ->searchable(),
                TextColumn::make('professionalDetail.goals')
                    ->label('Goals')
                    ->searchable(),
                TextColumn::make('contributions')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProfessionals::route('/'),
        ];
    }
}
