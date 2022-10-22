<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GreetingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail' , 'database'];
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
                    ->greeting('Hello ' . $notifiable->name)
                    ->line('This is A Greeting Mail For You.')
                    ->action('Notification Action', url('/dashboard'))
                    ->line('Thank you for using our application!');
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


    public function toDatabase($notifiable){
        return [
            'body'=>'Welcome '.$notifiable->name . " In Our Stor ",
            'url'=>'/',
            'icon'=>'fa fa-users',
        ];
    }
}
