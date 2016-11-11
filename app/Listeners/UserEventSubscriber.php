<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {}

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {}

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\AgentCreate',
            'App\Listeners\UserEventSubscriber@onAgentCreate'
        );

        $events->listen(
            'Illuminate\Auth\Events\AgentDelete',
            'App\Listeners\UserEventSubscriber@onAgentDelete'
        );
    }

}