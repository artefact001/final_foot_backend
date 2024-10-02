<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatcheRequest;
use App\Models\matche;
use App\Services\MatcheService;
use Illuminate\Http\JsonResponse;

class MatcheController extends Controller
{
    protected $matcheService;

    public function __construct(MatcheService $matcheService)
    {
        $this->matcheService = $matcheService;
    }

    /**
     * Afficher la liste des matchs.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $matches = $this->matcheService->recupererTousLesMatchs();
        return response()->json($matches, 200);
    }

    /**
     * Créer un nouveau match.
     *
     * @param MatcheRequest $request
     * @return JsonResponse
     */
    public function store(MatchRequest $request): JsonResponse
    {
        $matche = $this->matcheService->creerMatche($request->validated());
        return response()->json($matche, 201);
    }

    /**
     * Afficher un match spécifique.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $matche = $this->matcheService->recupererMatcheParId($id);
        return response()->json($matche, 200);
    }

    /**
     * Mettre à jour un match existant.
     *
     * @param MatcheRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(MatcheRequest $request, int $id): JsonResponse
    {
        $matche = $this->matcheService->recupererMatcheParId($id);
        $matche = $this->matcheService->mettreAJourMatche($match, $request->validated());
        return response()->json($matche, 200);
    }

    /**
     * Supprimer un matche.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $matche = $this->matcheService->recupererMatchParId($id);
        $this->matcheService->supprimerMatche($matche);
        return response()->json(null, 204);
    }
}
