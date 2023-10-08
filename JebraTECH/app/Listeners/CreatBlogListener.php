<?php

namespace App\Listeners;

use App\Events\CreatBlogEvent;
use App\Models\Follow;
use App\Notifications\CreatBlogNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CreatBlogListener
{

    public function __construct()
    {
        //
    }

    public function handle(CreatBlogEvent $event): void
    {
        $followers= Follow::where('followed_id', $event->blog->writter_id)->get();
        Notification::send($followers, new CreatBlogNotification($event->blog->writter_id, $event->blog->id));
    }
}
