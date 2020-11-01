<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    private $mode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $mode)
    {
        $this->data = $data;
        $this->mode = $mode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->mode == 'to_admin') {

            return $this->view('mails.contact')
                ->subject("Vous avez reçu un message !")
                ->with([
                    'mode' => $this->mode,
                    'firstname' => $this->data['firstname'],
                    'lastname' => $this->data['lastname'],
                    'city' => $this->data['city'],
                    'email' => $this->data['email'],
                    'mess' => $this->data['message']
                ]);

        } else if ($this->mode == 'to_sender') {

            return $this->view('mails.contact')
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
}
