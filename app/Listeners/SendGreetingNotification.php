<?php

namespace App\Listeners;

use App\Events\NewRegisterUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\GreetingNotification;
class SendGreetingNotification
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
     * @param  \App\Events\NewRegisterUser  $event
     * @return void
     */
    public function handle(NewRegisterUser $event)
    {
        $event->user->notify(new GreetingNotification($event->user));
    }
}
