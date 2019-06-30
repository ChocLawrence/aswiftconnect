<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JobInCompleteToFreelancer extends Notification implements ShouldQueue
{
    use Queueable;
    public $post;
    public $freelancer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post,$freelancer)
    {
        $this->post = $post;
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
        return (new MailMessage)->subject("Project marked incomplete")->markdown('emails.freelancer.projectincomplete', ['post' => $this->post,'freelancer' => $this->freelancer]);      
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
