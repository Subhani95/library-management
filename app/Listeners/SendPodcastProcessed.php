<?php

namespace App\Listeners;

use App\Events\PodcastProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendPodcastProcessed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PodcastProcessed  $event
     * @return void
     */
    public function handle(PodcastProcessed $event)
    {
        // $user = $event->user;
        // Mail::send('emails.welcome', ['user' => $user], function ($message) use ($user) {
        //         $message->from('hassan.subhani@ilsainteractive.com', 'Hassan');
        //         $message->subject('Welcome aboard '.$user->name.'!');
        //         $message->to($user->email);
        //     });

        info('User has been registered');
        // dd($event);
        //
        // $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Welcome to our website. Hope you will enjoy our articles.');
  
        // Mail::send('emails.mail', $data, function($message) use ($data) {
        //     $message->to($data['email'])
        //             ->subject('Welcome to our Website');
        // });
        
    }
}
