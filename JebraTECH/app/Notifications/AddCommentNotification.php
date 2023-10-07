<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddCommentNotification extends Notification
{
    use Queueable;

    public function __construct(public $comment_writer, public $blog_id)
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
            "blog_id" => $this->blog_id,
            "comment_writer" => $this->comment_writer,
        ];
    }
}
