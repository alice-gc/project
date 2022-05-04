<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Events\NewUserRegistered;

class MakeSampleData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        $user = $event->user;
        Artisan::call('db:seed', ['--class' => 'StartDataSeeder']);
    }
}
