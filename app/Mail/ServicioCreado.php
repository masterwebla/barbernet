<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServicioCreado extends Mailable
{
    use Queueable, SerializesModels;

    public $nombreto;
    public $precioto;
    public $emailto;

    public function __construct($nombreto,$precioto,$emailto)
    {
        $this->nombreto = $nombreto;
        $this->precioto = $precioto;
        $this->emailto = $emailto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('barbernet@osmaro.com')
                    ->subject('Nuevo servicio en Barbarnet')
                    ->view('mails.servicio');
    }
}
