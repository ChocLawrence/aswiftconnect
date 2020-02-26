<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends Notification implements ShouldQueue
{
    use Queueable;
    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token=$token;
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
        //return (new MailMessage)->from('info@aswiftconnect.com',"ASwiftConnect Inc")
       // ->subject("Reset ASwiftConnect Password")->markdown('vendor.notifications.email', ['token' => $this->token]);
        return (new MailMessage)
        ->from('info@aswiftconnect.com',"ASwiftConnect Inc")
        ->subject("Reset ASwiftConnect Password")
        ->line('Your password reset link is ready')
        ->action('Reset Password Now', url('password/reset', $this->token))
        ->line('If you did not request this action, no further action is needed');
   
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
