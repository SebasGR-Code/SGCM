<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Nueva cita medica';

    public $titulo;
    public $fecha;
    public $hora;
    public $doctor;
    public $sala;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $fecha, $hora, $doctor, $sala)
    {
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->doctor = $doctor;
        $this->sala = $sala;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cita-message');
    }
}
