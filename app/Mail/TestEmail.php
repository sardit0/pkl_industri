<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $minjem;

    public function __construct($minjem)
    {
        $this->minjem = $minjem;
    }

    public function build()
    {
        return $this->subject('Test Email Subject')
                    ->view('emails.testemail');
    }
}
