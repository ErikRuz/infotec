<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\AsistenteController;

/**
 * Rutas públicas (sin autenticación)
 */
// Consultar eventos
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);

// Consultar ponentes
Route::get('/ponentes', [PonenteController::class, 'index']);
Route::get('/ponentes/{id}', [PonenteController::class, 'show']);

/**
 * Rutas privadas (requieren autenticación OAuth2)
 */
Route::middleware('auth:api')->group(function () {
    
    // Eventos (crear, actualizar, eliminar)
    Route::post('/eventos', [EventoController::class, 'store']);
    Route::put('/eventos/{evento}', [EventoController::class, 'update']);
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
    
    // Ponentes (crear, actualizar, eliminar)
    Route::post('/ponentes', [PonenteController::class, 'store']);
    Route::put('/ponentes/{ponente}', [PonenteController::class, 'update']);
    Route::delete('/ponentes/{id}', [PonenteController::class, 'destroy']);
    
    // Asistentes (TODO protegido)
    Route::get('/asistentes', [AsistenteController::class, 'index']);
    Route::post('/asistentes', [AsistenteController::class, 'store']);
    Route::get('/asistentes/{id}', [AsistenteController::class, 'show']);
    Route::put('/asistentes/{asistente}', [AsistenteController::class, 'update']);
    Route::delete('/asistentes/{id}', [AsistenteController::class, 'destroy']);
});