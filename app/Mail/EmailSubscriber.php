<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class EmailSubscriber extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        // dd($data->email);
        // //dd($post->title);
        $this->post=$post;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('info@aswiftconnect.com')
        ->subject('New Post on ASwiftConnect')->markdown('emails.subscriber.newpost');
    }
}
