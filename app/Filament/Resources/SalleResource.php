<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalleResource\Pages;
use App\Filament\Resources\SalleResource\RelationManagers;
use App\Models\Salle;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SalleResource extends Resource
{
    protected static ?string $model = Salle::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    public static function getModelLabel(): string
    {
        return "Room (Salle)";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('number')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('cinema_id')
                            ->relationship('cinema', 'name')
                            ->native(false)
                            ->required(),
                    ])->columns(3),

                Repeater::make('films')
                    ->relationship('films')
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
                        Forms\Components\Select::make('villes')
                            ->relationship('villes', 'name')
                            ->searchable()
                            ->multiple()
                            ->native(false)
                            ->preload(),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required(),
                    ])->columnSpanFull()
                    ->columns(3)
                    ->label("Movies")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('cinema.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('number')
                    ->numeric()
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('first')
                    ->numeric()
                    ->badge()
                    ->suffix(" Place")
                    ->label("First class")
                    ->sortable(),

                Tables\Columns\TextColumn::make('second')
                    ->numeric()
                    ->label("Second class")
                    ->badge()
                    ->suffix(" Place")
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
            'index' => Pages\ListSalles::route('/'),
            'create' => Pages\CreateSalle::route('/create'),
            'edit' => Pages\EditSalle::route('/{record}/edit'),
        ];
    }
}
