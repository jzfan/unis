<?php

namespace App\Listeners;

use Log;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function onAgentCreate($event)
    {
        Log::info('新增代理：('.$event->user->id.')'.$event->user->name);
    }

    /**
     * Handle user logout events.
     */
    public function onAgentDelete($event)
    {
        Log::info('删除代理：('.$event->user->id.')'.$event->user->name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\AgentCreate',
            'App\Listeners\UserEventSubscriber@onAgentCreate'
        );

        $events->listen(
            'App\Events\AgentDelete',
            'App\Listeners\UserEventSubscriber@onAgentDelete'
        );
    }

}