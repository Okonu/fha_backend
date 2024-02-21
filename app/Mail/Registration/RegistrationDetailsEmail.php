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
    public $content;

    /**
     * Create a new content instance.
     *
     * @param string $to
     * @param string $subject
     * @param string $content
     */
    public function __construct($subject, $content)
    {
        // $this->to($to);
        $this->subject= $subject;
        $this->content = $content;
    }

    /**
     * Build the content.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration')
                    ->with([
                        'subject' => $this->subject,
                        'content' => $this->content,
                    ]);
    }

}
