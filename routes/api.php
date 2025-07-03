<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RecipeController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::get('/recipes', [RecipeController::class, 'index']);

// Proteger esta ruta para que solo usuarios autenticados puedan crear recetas
Route::middleware('auth:api')->post('/recipes', [RecipeController::class, 'store']);
