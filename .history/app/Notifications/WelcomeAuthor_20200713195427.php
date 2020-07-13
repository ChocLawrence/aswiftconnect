<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeAuthor extends Notification implements ShouldQueue
{
    use Queueable;
    public $author;
    public $resume;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($author)
    {
        $this->author=$author;
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
         return (new MailMessage)->from('info@aswiftconnect.com',"ASwiftConnect Inc")
         ->subject("You registered successfully as an employer")->markdown('emails.author.welcomeAuthor', ['author' => $this->author]);
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
