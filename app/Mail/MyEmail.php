<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $subject;
    public $data;

    public function __construct($view, $subject, $data)
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view($this->view)
                    ->with(['data' => $this->data]);
    }
}
