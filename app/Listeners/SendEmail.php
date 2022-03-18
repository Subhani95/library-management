<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Mail;
use App\Events\Email;
use Ap\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendingEmail;
use App\Mail\SendMailable;
class SendEmail
{
    public $books;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        //
        $this->books= $inputs;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Email  $event
     * @return void
     */
    public function handle(Email $event)
    {
//        $email = new SendingEmail($this->books);
//        Mail::to('subhanihassan16@gmail.com')->send(new SendingEmail());

    }
}
