<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;

    /**
     * Table associée au modèle (facultatif si le nom de la table n'est pas le pluriel du modèle).
     *
     * @var string
     */
    protected $table = 'matches';

    /**
     * Attributs qui peuvent être remplis via des requêtes massives.
     *
     * @var array
     */
    protected $fillable = [
        'competition_id',
        'equipe_local',
        'equipe_visiteur',
        'score_local',
        'score_visiteur',
        'date_matche'
    ];

    /**
     * Définir la relation avec la compétition.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
