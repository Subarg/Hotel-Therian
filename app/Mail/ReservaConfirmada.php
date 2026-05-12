<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReservaConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        // Este será el "Asunto" del correo
        return new Envelope(
            subject: 'Tu Reserva en Hotel Therian está Confirmada',
        );
    }

    public function content(): Content
    {
        // Le decimos qué archivo HTML usar para el diseño
        return new Content(
            view: 'emails.reserva',
        );
    }
}