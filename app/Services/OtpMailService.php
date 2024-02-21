<?php

namespace App\Services;

use App\Mail\OTP\OtpMail;
use Illuminate\Support\Facades\Mail;

class OtpMailService
{
    public function sendEmail($to, $subject, $content)
    {
        $mailable = new OtpMail($subject, $content);
        Mail::to($to)->send($mailable);
    }
}
