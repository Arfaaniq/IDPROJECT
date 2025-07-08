<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class IdProject extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    // Construct agar bisa dikirimkan data seperti nama, no hp, dll
    public function __construct($data)
    {
        $this->data = $data;
    }

// Subject pada email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemesanan Janji Temu anda',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    // Sending email
    public function build(){
        return $this->subject('Pemesanan Janji Temu Anda')
                ->view('mail.email')
                ->with(['d' => $this->data]);
    }
}
