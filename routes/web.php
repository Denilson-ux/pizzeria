<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UbicacionController;


// Redirige la ruta principal '/' a la página de login
Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');

    Route::resource('tipovehiculos', TipoVehiculoController::class);

    Route::resource('ubicaciones', UbicacionController::class);
});