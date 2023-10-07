<?php

namespace App\Listeners;

use App\Events\ShareEvent;
use App\Models\Blog;
use App\Models\User;
use App\Notifications\ShareNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ShareListener
{

    public function __construct()
    {
        //
    }

    public function handle(ShareEvent $event): void
    {
        $user_who_share = $event->share->user_id;
        $blog = Blog::find($event->share->blog_id);
        $notifiable_user = User::find($blog->writter_id);

        $notifiable_user->notify(new ShareNotification($user_who_share, $blog->id));
    }
}
