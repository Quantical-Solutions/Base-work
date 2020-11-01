<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->view('mails.newsletter')
            ->subject("Nous avons bien reçu votre message !")
            ->with([
                'mode' => $this->mode,
                'firstname' => $this->data['firstname'],
                'lastname' => $this->data['lastname'],
                'city' => $this->data['city'],
                'email' => $this->data['email'],
                'mess' => $this->data['message']
            ]);
    }
}
