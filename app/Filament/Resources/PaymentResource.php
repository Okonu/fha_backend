<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\Registration\Founder;
use App\Models\Registration\Investor;
use App\Models\Registration\Professional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id.name')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('external_ref')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('channel_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->query(function (Builder $query) {
            return $query
                ->leftJoin('founders', function ($join) {
                    $join->on('payments.user_id', '=', 'founders.id')
                         ->where('payments.user_type', Founder::class);
                })
                ->leftJoin('professionals', function ($join) {
                    $join->on('payments.user_id', '=', 'professionals.id')
                         ->where('payments.user_type', Professional::class);
                })
                ->leftJoin('investors', function ($join) {
                    $join->on('payments.user_id', '=', 'investors.id')
                         ->where('payments.user_type', Investor::class);
                })
                ->select('payments.*', 'founders.name as founder_name', 'professionals.name as professional_name', 'investors.name as investor_name');
        })
            ->search(function (Builder $query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('founders.name', 'like', "%{$search}%")
                          ->orWhere('professionals.name', 'like', "%{$search}%")
                          ->orWhere('investors.name', 'like', "%{$search}%");
                });
            })
            ->columns([
                Tables\Columns\TextColumn::make('user_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_type_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(false),
                Tables\Columns\TextColumn::make('external_ref')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('channel_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'view' => Pages\ViewPayment::route('/{record}'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
