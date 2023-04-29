<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PdfEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $subject;
    public $data;
    public $pdf;

    public function __construct($view, $subject, $data, $pdf)
    {
        $this->view = $view;
        $this->subject = $subject;
        $this->data = $data;
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view($this->view)
                    ->with(['data' => $this->data, 'pdf' => $this->pdf])
                    ->attachData($this->pdf->output(), 'evento.pdf')
                    ->from('constancias@prepa11.com', 'Constancias-Prepa11');
    }
}
