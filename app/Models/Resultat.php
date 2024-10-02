<?php
/// app/Models/Resultat.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = [
        'matche_id',
        'equipe_id',
        'score',
        'is_winner',
        'buteurs',
        'passeurs',
        'homme_du_match',
    ];

    // Relation avec le match
    public function matche()
    {
        return $this->belongsTo(Matche::class);
    }

    // Relation avec l'équipe
    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    // Relation avec l'homme du match
    public function hommeDuMatch()
    {
        return $this->belongsTo(Joueur::class, 'homme_du_match');
    }

    // Accesseur et mutateur pour les buteurs et passeurs
    public function getButeursAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setButeursAttribute($value)
    {
        $this->attributes['buteurs'] = json_encode($value);
    }

    public function getPasseursAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setPasseursAttribute($value)
    {
        $this->attributes['passeurs'] = json_encode($value);
    }
}
