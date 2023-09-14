<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WarningUserFromBlock extends Notification
{
    use Queueable;


    public function __construct(public User $writer, public $blockCounts)
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
            'block_counts' => $this->blockCounts,
            'writer_name' => $this->writer->name ,
            'writer_id' => $this->writer->id,
            'message' => 'Someone blocked you now you got '.$this->blockCounts.' blocks from totally 10 blocks to be deny from writing for month'
        ];
    }
}
