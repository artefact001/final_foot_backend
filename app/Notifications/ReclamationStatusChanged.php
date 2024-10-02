<?php

// app/Notifications/ReclamationStatusChanged.php
namespace App\Notifications;

use App\Models\Reclamation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReclamationStatusChanged extends Notification
{
    use Queueable;

    protected $reclamation;

    public function __construct(Reclamation $reclamation)
    {
        $this->reclamation = $reclamation;
    }

    // Déterminer les canaux de notification
    public function via($notifiable)
    {
        return ['mail']; // Ou ajouter 'database' si tu veux stocker la notification dans la base de données
    }

    // Contenu de la notification par e-mail
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Changement de statut de votre réclamation')
            ->line('Le statut de votre réclamation a changé.')
            ->line('Description : ' . $this->reclamation->description)
            ->line('Nouveau statut : ' . $this->reclamation->status)
            ->action('Voir la réclamation', url('/reclamations/' . $this->reclamation->id))
            ->line('Merci d\'avoir utilisé notre application !');
    }

    // (Optionnel) Contenu pour d'autres canaux
    public function toArray($notifiable)
    {
        return [
            'reclamation_id' => $this->reclamation->id,
            'status' => $this->reclamation->status,
        ];
    }
}
