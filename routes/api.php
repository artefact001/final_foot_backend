<?php




use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompetitionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipeController;

use App\Http\Controllers\MatchController;





// Routes protégées par le middleware d'authentification
Route::middleware('auth:api')->group(function () {
    // Routes pour la gestion des utilisateurs
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Route pour la déconnexion (nécessite également d'être authentifié)
    Route::post('logout', [AuthController::class, 'logout']);
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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);





Route::apiResource('equipes', EquipeController::class);


Route::apiResource('competitions', CompetitionController::class);


Route::apiResource('matchs', MatchController::class);
