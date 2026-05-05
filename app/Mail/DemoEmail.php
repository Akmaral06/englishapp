<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo; 

    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    public function build()
{
    return $this->from('akmaralmuldaseva1@gmail.com')
                ->subject('Demo Email')
                ->view('mails.demo')
                ->with([
                    'receiverName' => $this->demo->receiver,
                ]);
}

    public function attachments(): array
    {
        return [];
    }
}