<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $pass;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $pass
     */
    public function __construct($user,$pass)
    {
        $this->user = $user;
        $this->pass = $pass;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome', ['user' => $this->user, 'pass' => $this->pass]);
    }
}
