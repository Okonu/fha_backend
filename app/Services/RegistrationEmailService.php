<?php

namespace App\Services;

use App\Mail\Registration\RegistrationDetailsEmail;
use Illuminate\Mail\MailManager;
use Illuminate\Support\Facades\Mail;

class RegistrationEmailService
{
    public function sendEmail($to, $subject, $content)
    {
        $mailable = new RegistrationDetailsEmail($subject, $content);
        Mail::to($to)->send($mailable);
    }
}
