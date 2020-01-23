<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserEmailConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * user email verification code 
     */ 
    protected $emailVerificationCode;

    public function __construct($emailVerificationCode){
        $this->emailVerificationCode = $emailVerificationCode;
    }


    /**
     * Build the message.
     * @param $emailVerificationCode
     * @return eamil view
     */
    public function build()
    {
        $this->emailVerificationCode;
        // return $this->view('auth.verify', compact('this->emailVerificationCode'));
        return $this->view('auth.verify')->with([
            'emailVerificationCode' => $this->emailVerificationCode
        ]);
    }
}
