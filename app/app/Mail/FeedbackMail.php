<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $feedbackData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($feedbackData)
    {
        $this->feedbackData = $feedbackData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject('New Feedback Received')
                      ->view('mail.feedback')
                      ->with('data', $this->feedbackData);

        if ($this->feedbackData['filePath']) {
            $email->attach(storage_path('app/public/' . $this->feedbackData['filePath']));
        }

        return $email;
    }
}