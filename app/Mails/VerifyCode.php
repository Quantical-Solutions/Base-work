<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class VerifyCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The code instance.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.sendCode')
            ->subject("Code de vérification")
            ->with([
                'code' => $this->user->email_code,
                'name' => $this->user->name
            ]);
    }
}
