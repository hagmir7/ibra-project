<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmPlaceResource\Pages;
use App\Filament\Resources\FilmPlaceResource\RelationManagers;
use App\Models\FilmPlace;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilmPlaceResource extends Resource
{
    protected static ?string $model = FilmPlace::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Options';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('MAD'),
                        Forms\Components\Select::make('place_type_id')
                            ->required()
                            ->label("Place Type")
                            ->native(false)
                            ->relationship('placeTypes', "name"),
                        Forms\Components\Select::make('film_id')
                            ->label("Movie")
                            ->relationship('film', 'title')
                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                            ->searchable()
                            ->preload()
                            ->native(false)
                            ->required(),
                        ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('film_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListFilmPlaces::route('/'),
            'create' => Pages\CreateFilmPlace::route('/create'),
            'edit' => Pages\EditFilmPlace::route('/{record}/edit'),
        ];
    }
}
