<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlockedUser extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(public User $writer)
    {

    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Block From Writing',
        );
    }


    public function content(): Content
    {
        return new Content(
            view:  'Emails.blockmail',
            with: (array)$this->writer,
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
