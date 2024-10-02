<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreatedNotification extends Notification
{
    use Queueable;

    protected $email;
    protected $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Bienvenue sur notre application!')
            ->line('Votre compte a été créé avec succès. Voici vos identifiants de connexion :')
            ->line('**Email** : ' . $this->email)
            ->line('**Mot de Passe** : ' . $this->password)
            ->action('Se connecter', url('/login')) // Assurez-vous que l'URL de connexion est correcte
            ->line('Merci d\'utiliser notre application !');
    }
}
