<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FreelancerSetTest extends Notification implements ShouldQueue
{
    use Queueable;
    public $freelancer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($freelancer)
    {
        $this->freelancer=$freelancer;
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
         ->subject("Your Test has been set")->markdown('emails.freelancer.vettestinfo', ['freelancer' => $this->freelancer]);              
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
