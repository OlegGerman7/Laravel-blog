<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body, $file)
    {
        $this->body = $body;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front.message')
        ->attachData($this->file, 'image.jpg', [
            'mime' => 'application/jpg',
        ]);
    }
}