<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PresentationNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $presentation, $receipent_name, $project_coordinator;
    public function __construct($presentation, $receipent_name, $project_coordinator)
    {
        $this->receipent_name = $receipent_name;
        $this->presentation = $presentation;
        $this->project_coordinator = $project_coordinator;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Presentation Schedule Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.presentation_confirmation',
            with: ['link' => 'https://ope.welcomehomestay.in/', 'presentation' => $this->presentation, 'receipent_name' => $this->receipent_name, 'project_coordinator' => $this->project_coordinator]
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
}
