<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('film/{film}', [FilmController::class, 'show'])->name('film');


Route::resource("/", FilmController::class);
Route::resource("cinema", CinemaController::class);

Route::resource("ticket", TicketController::class);


Route::prefix('/user')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('store', [UserController::class, 'store'])->name('store_user');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login-store', [UserController::class, 'loginStore'])->name('login.store');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

