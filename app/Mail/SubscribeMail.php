<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // 
        $this->subscriber=$data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(['address' =>'info@aswiftconnect.com','name' => 'ASwiftConnect Inc'])->subject('Successfully Subscribed to ASwiftConnect Newsletter')->markdown('emails.subscribe');
    }
}
