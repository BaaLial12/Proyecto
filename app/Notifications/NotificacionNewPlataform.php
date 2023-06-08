<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionNewPlataform extends Notification
{
    use Queueable;
    protected $plataform;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($plataform)
    {
        //
        $this->plataform=$plataform;

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
        ->subject('NUEVA PLATAFORMA DISPONIBLE')
        ->line('Hola!')
        ->line('¡Hemos añadido una nueva plataforma!')
        ->line('Ahora puedes ahorrar dinero en '.$this->plataform)
        ->line('Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.')
        ->line('¡Gracias por ser parte de nuestra aplicación!');

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
