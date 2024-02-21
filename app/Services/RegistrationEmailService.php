<?php

namespace App\Services;

use App\Mail\Registration\RegistrationDetailsEmail;
use Illuminate\Mail\MailManager;

class RegistrationEmailService
{
    protected $mailManager;

    public function __construct(MailManager $mailManager)
    {
        $this->mailManager = $mailManager;
    }

    public function sendEmail($to, $subject, $message)
    {
        $this->mailManager->send(new RegistrationDetailsEmail($to, $subject, $message));
    }
}
