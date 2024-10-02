<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\TirageController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\NotificationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes protégées par le middleware d'authentification
Route::middleware('auth:api')->group(function () {
    // Routes pour la gestion des utilisateurs
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
    // Route pour la déconnexion (nécessite également d'être authentifié)
    // Route::post('logout', [AuthController::class, 'logout']);
});
// Routes protégées par les middlewares d'authentification et de rôle
Route::middleware(['auth:api', 'role:Zone'])->group(function () {
    // Routes pour la gestion des compétitions
    Route::get('competitions', [CompetitionController::class, 'index']);
    Route::get('competitions/{id}', [CompetitionController::class, 'show']);
    Route::post('competitions', [CompetitionController::class, 'store']);
    Route::put('competitions/{id}', [CompetitionController::class, 'update']);
    Route::delete('competitions/{id}', [CompetitionController::class, 'destroy']);
});

// Routes ouvertes (sans authentification)
// Route::post('register', [AuthController::class, 'register']);
// Route::post('login', [AuthController::class, 'login']);

Route::apiResource('joueurs', JoueurController::class);

Route::apiResource('equipes', EquipeController::class);

Route::apiResource('competitions', CompetitionController::class);

Route::apiResource('matches', MatcheController::class);

Route::apiResource('tirages', TirageController::class);

Route::post('tirages/lancer', [TirageController::class, 'lancerTirage']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('reclamations', [ReclamationController::class, 'store']);
    Route::patch('reclamations/{id}/status', [ReclamationController::class, 'updateStatus']);
});

// Route pour récupérer les notifications
Route::middleware('auth:sanctum')->get('notifications', [NotificationController::class, 'index']);
