<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Notifications\MissYouNotification;
class RemeberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $days;
    public function __construct()
    {

    }

    public function handle()
    {
        $users = User::where('last_login' , '<=' , now()->subMonth())->get();
        foreach($users as $user){
            $user->notify(new MissYouNotification($user));
        }
    }
}
