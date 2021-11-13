<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject="Seguimiento de pedidos";
    public $order_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_data)
    {
        //
        $this->order_data= $order_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notify');
    }
}
