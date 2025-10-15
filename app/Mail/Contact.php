<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'javed.nedian@gmail.com';
        $subject = 'Contact Form Enquiry | Mango Wholesale UK';
        $name = 'Mango Wholesale UK';

        return $this->view('emails.contact')
            ->from($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with(
                
                [ 'data' => $this->data ]
            );
    }
}
