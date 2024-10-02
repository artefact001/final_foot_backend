<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'message',
        'user_id',  // ID de l'utilisateur qui recevra la notification
        'type',     // Type de notification (e.g., résultat, programme, événement)
        'status'    // Lu ou non lu
    ];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
