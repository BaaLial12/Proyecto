<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsuarioSalioDeGrupo extends Notification
{
    use Queueable;

    protected $grupo_id;
    protected $plataform;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($grupo_id, $plataform)
    {
        //
        $this->grupo_id = $grupo_id;
        $this->plataform = $plataform;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Un usuario se ha ido a tu grupo')
            ->line('Hola!')
            ->line('Un usuario se ha ido de tu grupo de ' . $this->plataform)
            ->action('Ver grupo', url('/groups/administration/' . $this->grupo_id))
            ->line('Gracias por usar nuestra aplicación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
