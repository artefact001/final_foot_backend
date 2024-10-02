<?php

namespace App\Services;

use App\Models\Matche;
use Illuminate\Support\Facades\Log;

class MatcheService
{
    /**
     * Créer un nouveau match.
     *
     * @param array $data Les données du nouveau matche
     * @return Matche
     */
    public function creerMatche(array $data)
    {
        try {
            return Matche::create($data);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du matche : ' . $e->getMessage());
            throw new \Exception('Erreur lors de la création du matche.');
        }
    }

    /**
     * Mettre à jour un matche existant.
     *
     * @param Matche $matche Le matche à mettre à jour
     * @param array $data Les nouvelles données
     * @return Matche
     */
    public function mettreAJourMatch(Matche $matche, array $data)
    {
        try {
            $matche->update($data);
            return $matche;
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour du matche : ' . $e->getMessage());
            throw new \Exception('Erreur lors de la mise à jour du matche.');
        }
    }

    /**
     * Supprimer un matche.
     *
     * @param Matche $matche Le matche à supprimer
     * @return void
     */
    public function supprimerMatch(Matche $matche)
    {
        try {
            $matche->delete();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du matche : ' . $e->getMessage());
            throw new \Exception('Erreur lors de la suppression du matche.');
        }
    }

    /**
     * Récupérer un match par son identifiant.
     *
     * @param int $id L'identifiant du matche
     * @return Matche
     */
    public function recupererMatchParId(int $id)
    {
        return Matche::findOrFail($id);
    }

    /**
     * Récupérer tous les matches.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function recupererTousLesMatchs()
    {
        return Matche::all();
    }
}
