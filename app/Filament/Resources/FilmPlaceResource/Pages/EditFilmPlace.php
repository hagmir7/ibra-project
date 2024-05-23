<?php

namespace App\Filament\Resources\FilmPlaceResource\Pages;

use App\Filament\Resources\FilmPlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilmPlace extends EditRecord
{
    protected static string $resource = FilmPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
