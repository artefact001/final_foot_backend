<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    // Spécifier la table si le nom n'est pas le pluriel du modèle (facultatif)
    protected $table = 'equipes';

    /**
     * Attributs qui peuvent être remplis via des requêtes massives.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'ville',
        'stade',
        'zone_id'

    ];

    // Si tu as des relations avec d'autres modèles, tu peux les définir ici
    // Par exemple, une équipe pourrait avoir plusieurs joueurs
    public function joueurs()
    {
        return $this->hasMany(Joueur::class); // Relation 1:N avec le modèle Joueur
    }

    public function competitions()
    {
        return $this->belongsTo(Competitions::class);
    }

}


