<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GrupoBorrado extends Notification
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
        ->subject('Grupo Borrado')
        ->line('Hola!')
        ->line('El grupo de .'.$this->plataform.' al que pertenecias ha sido borrado lamentablemente')
        ->line('Si necesitas más información, por favor contáctanos.')
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
