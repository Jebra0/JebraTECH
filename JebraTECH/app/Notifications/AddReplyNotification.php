<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddReplyNotification extends Notification
{
    use Queueable;

    public function __construct(public $reply_writer_id, public $comment_id, public $blog_id)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            "reply_writer" => $this->reply_writer_id,
            "comment"      => $this->comment_id,
            "blog"         => $this->blog_id,
        ];
    }
}
