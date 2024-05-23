<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;


Route::get('film/{film}', [FilmController::class, 'show'])->name('film');


Route::resource("/", FilmController::class);


