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
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ClassementController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\DashboardViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatistiqueController;

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



Route::prefix('resultats')->group(function () {
    Route::post('/', [ResultatController::class, 'store']); // Enregistrer un résultat
    Route::get('/matche/{matcheId}', [ResultatController::class, 'show']); // Afficher les résultats d'un match
    Route::post('/matche/{matcheId}/winner', [ResultatController::class, 'determineWinner']); // Déterminer le gagnant
});



Route::get('rankings', [PointController::class, 'rankings']);
Route::get('teams/{equipeId}/points', [PointController::class, 'teamPoints']);




// Route pour récupérer le classement global
Route::get('classement', [ClassementController::class, 'getGlobalRankings']);

// Route pour récupérer le classement d'une équipe spécifique
Route::get('classement/equipe/{equipeId}', [ClassementController::class, 'getTeamRank']);



// Route pour créer un calendrier
Route::post('calendriers', [CalendrierController::class, 'create']);

// Route pour mettre à jour un calendrier
Route::put('calendriers/{calendrier}', [CalendrierController::class, 'update']);

// Route pour supprimer un calendrier
Route::delete('calendriers/{calendrier}', [CalendrierController::class, 'delete']);

// Route pour récupérer tous les calendriers
Route::get('calendriers', [CalendrierController::class, 'getAll']);

// Route pour récupérer les calendriers d'un match spécifique
Route::get('calendriers/match/{matchId}', [CalendrierController::class, 'getByMatch']);



// Route pour afficher la vue du tableau de bord
Route::get('dashboard', [DashboardViewController::class, 'index']);




// Route pour afficher les statistiques du tableau de bord
Route::get('dashboard/stats', [DashboardController::class, 'getStats']);



Route::prefix('classements')->group(function () {
    // Route pour récupérer le classement des équipes
    Route::get('/', [ClassementController::class, 'index'])->name('classements.index');
});





// Routes pour l'historique des matchs
Route::get('/matches', [MatcheController::class, 'index'])->name('matches.index');
Route::post('/matches', [MatcheController::class, 'store'])->name('matches.store');





// Route pour obtenir les notifications d'un utilisateur
Route::get('notifications', [NotificationController::class, 'index']);

// Route pour marquer une notification comme lue
Route::put('notifications/{id}/read', [NotificationController::class, 'markAsRead']);

// Route pour marquer toutes les notifications comme lues
Route::put('notifications/read-all', [NotificationController::class, 'markAllAsRead']);





Route::prefix('statistiques')->group(function () {
    // Route pour créer une nouvelle statistique
    Route::post('/', [StatistiqueController::class, 'store'])->name('statistiques.store');

    // Route pour récupérer toutes les statistiques
    Route::get('/', [StatistiqueController::class, 'index'])->name('statistiques.index');

    // Route pour récupérer les statistiques d'un joueur spécifique
    Route::get('/joueur/{joueurId}', [StatistiqueController::class, 'showByJoueur'])->name('statistiques.showByJoueur');

    // Route pour mettre à jour une statistique
    Route::put('/{id}', [StatistiqueController::class, 'update'])->name('statistiques.update');

    // Route pour supprimer une statistique
    Route::delete('/{id}', [StatistiqueController::class, 'destroy'])->name('statistiques.destroy');
});
