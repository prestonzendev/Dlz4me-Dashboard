<?php

namespace App\Listeners\Frontend\Auth;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        \Log::info('User Logged In: '.$event->user->first_name);

        // Generating notification
        createNotification('User Logged In: '.$event->user->first_name.' | '.$event->user->email, $event->user->id);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        \Log::info('User Logged Out: '.$event->user->first_name);

        createNotification('User Logged Out: '.$event->user->first_name.' | '.$event->user->email, $event->user->id);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        \Log::info('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Verified: '.$event->user->first_name);

        createNotification('User Verified: '.$event->user->first_name.' | '.$event->user->email, $event->user->id);
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        \Log::info('User Deactivated: '.$event->user->first_name);

        createNotification('User Deactivated: '.$event->user->first_name.' | '.$event->user->email, $event->user->id);
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        \Log::info('User Reactivated: '.$event->user->first_name);

        createNotification('User Reactivated: '.$event->user->first_name.' | '.$event->user->email, $event->user->id);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Frontend\Auth\UserLoggedIn::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserLoggedOut::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserRegistered::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            \App\Events\Frontend\Auth\UserConfirmed::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserDeactivated::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onDeactivated'
        );

        $events->listen(
            \App\Events\Backend\Access\User\UserReactivated::class,
            'App\Listeners\Frontend\Auth\UserEventListener@onReactivated'
        );
    }
}
