<?php

namespace App\Mail;

use Aws\CloudFront\UrlSigner;
use http\Client\Curl\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class ResetPasswordMail extends Mailable
{
     private string $username;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($selectedUser)
    {
        $this->username = $selectedUser->name;
    }

    /**
     * Build the message.
     * @return $this
     * @author Abdullah Hegab
     */
    public function build()
    {
        $generateUrl = Url::temporarySignedRoute('reset-password', now()->addMinutes(5),["user"=> $this->username]);
        $myUrl = explode(',', $generateUrl);
        return $this->from('meetDoc@gmail.com')
            ->subject('Reset password')
            ->view('mails.resetPassword', ['myUrl' => $myUrl[1]]);
    }
}
