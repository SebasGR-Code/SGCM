<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PenaltyMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Multa por inasistencia a cita';

    public $fecha;
    public $hora;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fecha, $hora)
    {
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.penalty-message');
    }
}
