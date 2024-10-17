<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\CruceController;

// Ruta principal que redirige al índice de clientes
Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');

// Rutas de Clientes
Route::resource('clientes', ClienteController::class);

// Rutas de Contratos
Route::resource('contratos', ContratoController::class);

// Rutas de Cruces
Route::get('/cruces', [CruceController::class, 'index'])->name('cruces.index');
Route::post('/cruces/cruce', [CruceController::class, 'cruce'])->name('cruces.cruce');
