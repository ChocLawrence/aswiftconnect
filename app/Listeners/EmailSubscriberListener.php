<?php

namespace App\Listeners;

use App\Events\NewPostEvent;
use App\Mail\EmailSubscriber;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailSubscriberListener
{
    /**
     * Handle the event.
     *
     * @param  NewPostEvent  $event
     * @return void
     */
    public function handle(NewPostEvent $event)
    {
        //
        Mail::to($event->subscriber->email)->send(new EmailSubscriber($event->post));
    }
}
