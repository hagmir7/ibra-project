<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Filament\Resources\FilmResource\RelationManagers;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\Place;
use App\Models\PlaceType;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    public static function getModelLabel(): string
    {
        return "Movie";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('start_at')
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('duree')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('category')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Select::make('cinema_id')
                            ->options(Cinema::all()->pluck('name', 'id'))
                            ->label("Cinem")
                            ->native(false)
                            ->searchable(),
                        Forms\Components\Select::make('salle_id')
                            ->relationship('salle', "name", fn (Builder $query, Get $get) => $query->where('cinema_id', $get('cinema_id')))
                            ->label("Salle")
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->preload(),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('filmes')
                            ->required(),

                    ])->columns(3),

                Repeater::make('filmPlaces')
                    ->relationship("filmPlaces")
                    ->schema([
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('MAD'),
                        Forms\Components\Select::make('place_type_id')
                            ->options(PlaceType::all()->pluck('name', 'id'))
                            ->required()
                            ->label("Place Type")
                            ->native(false)

                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duree')
                    ->suffix(" Hour")
                    ->badge()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salle.number')
                    ->badge()
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
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
