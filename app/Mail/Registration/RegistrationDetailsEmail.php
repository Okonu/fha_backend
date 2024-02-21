<?php

namespace App\Mail\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationDetailsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param string $to
     * @param string $subject
     * @param string $message
     */
    public function __construct($subject, $message)
    {
        // $this->to($to);
        $this->subject= $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration')
                    ->with([
                        'subject' => $this->subject,
                        'message' => $this->message,
                    ]);
    }

}
