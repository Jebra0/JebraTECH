<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatBlogNotification extends Notification
{
    use Queueable;

    public function __construct(public $writer_id, public $blog_id)
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
            "Writer_id" => $this->writer_id,
            "blog_id"   => $this->blog_id,
        ];
    }
}
