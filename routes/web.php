<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoVehiculoController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;

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

    Route::resource('repartidor', \App\Http\Controllers\RepartidorController::class);
    Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
    Route::resource('vehiculos', \App\Http\Controllers\VehiculoController::class);
});