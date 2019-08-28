<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;

class  WelcomeSubscriberListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        //step one
        Mail::to($event->subscriber->email)->send(new SubscribeMail($event->subscriber));

    }
}
