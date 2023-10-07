<?php

namespace App\Listeners;

use App\Events\FollowEvent;
use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FollowListener
{

    public function __construct()
    {
        //
    }

    public function handle(FollowEvent $event): void
    {
        $user_who_follow = $event->follow->follower_id;
        $notifiable_user = User::find($event->follow->followed_id);

        $notifiable_user->notify(new FollowNotification($user_who_follow));
    }
}
