<?php

namespace App\Listeners;

use App\Events\AddComment;
use App\Models\Blog;
use App\Models\User;
use App\Notifications\AddCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddCommentListener
{

    public function __construct()
    {
        //
    }

    public function handle(AddComment $event): void
    {

        $blog = Blog::find($event->comment->blog_id);

        $notifiable_user = User::find($blog->writter_id);

        $notifiable_user->notify(new AddCommentNotification($event->comment->user_id, $blog->id));

    }
}
