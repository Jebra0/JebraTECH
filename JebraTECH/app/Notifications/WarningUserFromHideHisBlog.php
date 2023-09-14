<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WarningUserFromHideHisBlog extends Notification
{
    use Queueable;


    public function __construct(public Blog $blog, public $reportscount )
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
            'blog_id' => $this->blog->id,
            'blog_title' => $this->blog->title,
            'reborts_count' => $this->reportscount,
            'message' => 'Someone Reported your blog '.$this->blog->title.',
                          that report number '.$this->reportscount.' from 10 to hidden that blog
'
        ];
    }
}
