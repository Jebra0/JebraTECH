<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HideBlogNotification extends Notification
{
    use Queueable;


    public function __construct(public $writerame, public Blog $blog)
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
            'writer_name' => $this->writerame,
            'blog_title' => $this->blog->title,
            'blog_id' => $this->blog->id,
            'message' => 'According to the terms and rules that you agreed to,
                          we decided to Hide your blog '.$this->blog->title.' on JebraTECH,
                          Because of its content.'
        ];
    }
}
