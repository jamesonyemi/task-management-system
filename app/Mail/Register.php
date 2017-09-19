<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Register extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $ResetPassword_Url = 'http://localhost/task_manager/public/login';
        $sendEmail =['auth.login' ];
        
        $address = 'ignore@batcave.io';
        $name = 'Ignore Me';
        $subject = 'Krytonite Found';

    return $this->view(APP_URL.$sendEmail)
                ->from($address, $name)
                ->cc($address, $name)
                ->bcc($address, $name)
                ->replyTo($address, $name)
                ->subject($subject);

        // return $this->view($sendEmail);
    }
}
