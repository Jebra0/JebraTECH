<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ShareNotification extends Notification
{
    use Queueable;

    public function __construct(public $user_who_share, public $blog_id)
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
            "user_who_share" => $this->user_who_share,
            "blog_id"        => $this->blog_id,
        ];
    }
}
