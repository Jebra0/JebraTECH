<?php

namespace App\Listeners;

use App\Events\LikeEvent;
use App\Models\Blog;
use App\Models\User;
use App\Notifications\LikeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikeListener
{

    public function __construct()
    {
        //
    }

    public function handle(LikeEvent $event): void
    {
        $user_who_like = $event->like->user_id;
        $blog = Blog::find($event->like->blog_id);
        $notifiable_user = User::find($blog->writter_id);

        $notifiable_user->notify(new LikeNotification($user_who_like, $blog->id));
    }
}
