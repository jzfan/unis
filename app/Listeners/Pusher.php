<?php

namespace App\Listeners;

use App\Events\OrderReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Pusher
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
     * @param  TakeOrder  $event
     * @return void
     */
    public function handle(OrderReceived $event)
    {
        var_dump('The user '.$event->name . ' has registered. Fire off an email.');
    }
}
