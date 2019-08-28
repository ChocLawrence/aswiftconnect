<?php

namespace App\Providers;

use App\Providers\NewPostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSubscribersListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewPostEvent  $event
     * @return void
     */
    public function handle(NewPostEvent $event)
    {
        //
    }
}
