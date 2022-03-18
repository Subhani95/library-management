<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Book;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $books;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        //
        $this->books= $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

$book = $this->books;
        return $this->from('hassan.subhani@ilsainteractive.com')
            ->subject('New Book Added')
            ->view('emails.sendingemail',compact("book"));
    }
}
