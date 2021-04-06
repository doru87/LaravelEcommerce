<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $data = ['name'=> $event->user->name,'email' => $event->user->email,'body'=>'Welcome to our website.We hope you enjoy shopping with us!'];

        Mail::send('email',$data,function($message) use ($data) {
            $message->to($data['email'],$data['name'])->subject('Welcome to our Website');
            $message->from('thqromania@gmail.com');
        });
    }
}
