<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // ID de l'utilisateur ayant fait la réclamation
        'description',   // Description de la réclamation
        'status',        // Statut de la réclamation (e.g., 'en attente', 'traitée')
        'equipe_id',     // ID de l'équipe concernée
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec l'équipe
    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
