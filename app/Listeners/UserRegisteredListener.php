<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Notifications\UserRecruited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredListener
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        if($user->userData->referred)
        {
            //notify the recruiter
            $recruiter = $user->userData->parent();

            $this->notifyParent($recruiter, $user);
        }
    }

    private function notifyParent($parent, $newUser)
    {
        $parent = $parent->user;

        $parent->notify(new UserRecruited($newUser));
    }
}
