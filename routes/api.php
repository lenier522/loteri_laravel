<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\UserController;

// Ruta para el registro de usuarios
Route::post('register', [RegisterController::class, 'register']);

// Ruta para el inicio de sesión
Route::post('login', [LoginController::class, 'login']);

Route::post('/change-password', [UserController::class, 'changePassword']);

Route::post('/eliminar',[UserController::class,'deleteUser']);

Route::get('/users', [UserController::class, 'listUsers']);

// Rutas para los resultados
Route::get('resultados/latest', [ResultadoController::class, 'latest']);
Route::get('/resultados', [ResultadoController::class, 'index']);
Route::get('/resultados/{id}', [ResultadoController::class, 'show']);
Route::post('/resultados', [ResultadoController::class, 'store']);
Route::put('/resultados/{id}', [ResultadoController::class, 'update']);
Route::delete('/resultados/{id}', [ResultadoController::class, 'destroy']);
