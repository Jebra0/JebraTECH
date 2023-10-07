<?php

namespace App\Listeners;

use App\Events\AddReply;
use App\Models\Comment;
use App\Models\User;
use App\Notifications\AddReplyNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddReplyListener
{

    public function __construct()
    {
        //
    }


    public function handle(AddReply $event): void
    {
        $reply_writer_id = $event->reply->user_id;

        $comment = Comment::find($event->reply->comment_id);

        $notifiable_user = User::find($comment->user_id);

        $notifiable_user->notify(new AddReplyNotification($reply_writer_id, $comment->id, $comment->blog_id));
    }
}
