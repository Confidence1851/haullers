<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderInformation extends Mailable
{

    use Queueable, SerializesModels;
    
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($me)
    {
        $this->data = $me;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.payment.payment-form', compact('data'));
    }
}
