<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipeRequest;
use App\Models\Equipe;
use App\Services\EquipeService;
use Illuminate\Http\JsonResponse;

class EquipeController extends Controller
{
    protected $equipeService;

    public function __construct(EquipeService $equipeService)
    {
        $this->equipeService = $equipeService;
    }

    /**
     * Afficher la liste des équipes.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $equipes = $this->equipeService->recupererToutesLesEquipes();
        return response()->json($equipes, 200);
    }

    /**
     * Créer une nouvelle équipe.
     *
     * @param EquipeRequest $request
     * @return JsonResponse
     */
    public function store(EquipeRequest $request): JsonResponse
    {
        $equipe = $this->equipeService->creerEquipe($request->validated());
        return response()->json($equipe, 201);
    }

    /**
     * Afficher une équipe spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $equipe = $this->equipeService->recupererEquipeParId($id);
        return response()->json($equipe, 200);
    }

    /**
     * Mettre à jour une équipe existante.
     *
     * @param EquipeRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(EquipeRequest $request, int $id): JsonResponse
    {
        $equipe = $this->equipeService->recupererEquipeParId($id);
        $equipe = $this->equipeService->mettreAJourEquipe($equipe, $request->validated());
        return response()->json($equipe, 200);
    }

    /**
     * Supprimer une équipe.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $equipe = $this->equipeService->recupererEquipeParId($id);
        $this->equipeService->supprimerEquipe($equipe);
        return response()->json(null, 204);
    }
}
