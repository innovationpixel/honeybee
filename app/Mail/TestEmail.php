<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
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
        $address = 'enquiry@autocare.ae';
        $subject = 'Quote Request - Autocare.ae';
        $name = 'Enquiry';

        return $this->view('emails.home')
            ->from($address, $name)
            ->cc('dianne@agefilms.com', 'dianne')
            ->cc('rorelyn.montalbo@agefilms.com', 'Rorelyn Montalbo')
            ->cc('nikki@agefilms.com', 'Nikki')
            ->cc('apexgulf@hotmail.com', 'Apexgulf')
            //->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with(
                
                [ 'data' => $this->data ]
            );
    }
}
