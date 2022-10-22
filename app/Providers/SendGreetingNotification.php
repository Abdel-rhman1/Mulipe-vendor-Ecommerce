<?php

namespace App\Providers;

use App\Providers\NewRegisterUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  \App\Providers\NewRegisterUser  $event
     * @return void
     */
    public function handle(NewRegisterUser $event)
    {
        //
    }
}
