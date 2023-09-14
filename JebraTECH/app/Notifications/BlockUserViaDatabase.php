<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BlockUserViaDatabase extends Notification
{
    use Queueable;


    public function __construct(public User $writer)
    {

    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'writer_name' => $this->writer->name ,
            'writer_id' => $this->writer->id,
            'message' => 'According to the terms and rules that you agreed to,
                          we decided to prevent you from participating on JebraTECH for a month,
                          and this is because of the content you provide..'
        ];
    }
}
