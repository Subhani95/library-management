<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendingPassword extends Mailable
{
    use Queueable, SerializesModels;
public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user= $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        return $this->from('hassan.subhani@ilsainteractive.com')
            ->subject('Congratulations, Your New Password Created Successfully')
            ->view('emails.sendingpassword',compact("user"));
    }
}
