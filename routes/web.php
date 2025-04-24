<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeportistaController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/',[DeportistaController::class, 'index']);*/

Route::resource('deportistas', DeportistaController::class);

Route::resource('entrenadores', EntrenadorController::class)->parameters(['entrenadores' => 'entrenador']);
Route::resource('clubes', ClubController::class)->parameters(['clubes' => 'club']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/deportista/perfil', [DeportistaController::class, 'perfil'])->name('deportistas.perfil');
    Route::get('/deportista/rutinas', [DeportistaController::class, 'rutinas'])->name('deportistas.rutinas');
    Route::get('/deportista/clubes', [DeportistaController::class, 'clubes'])->name('deportistas.clubes');
});
// Rutas para el perfil del deportista
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update-photo', [App\Http\Controllers\ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::post('/profile/update-sports', [App\Http\Controllers\ProfileController::class, 'updateSports'])->name('profile.updateSports');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/entrenador/perfil', [EntrenadorController::class, 'perfil'])->name('entrenadores.perfil');
    Route::get('/entrenador/clubes', [EntrenadorController::class, 'clubes'])->name('entrenadores.clubes');
});
Route::resource('clubes', ClubController::class);
// En routes/web.php
Route::get('/entrenadores/createclub', [EntrenadorController::class, 'createClub'])->name('entrenadores.createclub');
Route::post('/entrenadores/storeclub', [EntrenadorController::class, 'storeClub'])->name('entrenadores.storeclub');
