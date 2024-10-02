<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // Spécifier la table si le nom n'est pas le pluriel du modèle (facultatif)
    protected $table = 'competitions';

    /**
     * Attributs qui peuvent être remplis via des requêtes massives.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'lieu',
        'date_debut',
        'date_fin'
    ];

    // Si tu as des relations avec d'autres modèles, tu peux les définir ici
    // Par exemple, une compétition peut avoir plusieurs équipes participantes
    public function equipes()
    {
        return $this->belongsToMany(Equipe::class, 'competition_equipe'); // Relation N:N avec les équipes
    }
}
