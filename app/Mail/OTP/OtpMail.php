<?php

namespace App\Mail\OTP;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content)
    {
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Build the content.
     */
    public function build()
    {
        return $this->view('emails.otp')
            ->with([
                'subject', $this->subject,
                'content' => $this->content
            ]);
    }


}
