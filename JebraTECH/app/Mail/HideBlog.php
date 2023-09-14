<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HideBlog extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(public $writername, public $blogtitle)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hide Blog',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'Emails.hideblogmail',
            with: [$this->writername, $this->blogtitle]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
