<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ListQuoteMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="SG Iluminacion Cotizacion";
    public $listquote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($listquote)
    {
        //
        $this->listquote= $listquote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.listquote');
    }
}
