<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Email;
use LaravelQRCode\Facades\QRCode;

class EmailNotificationMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $qr = QRCode::email($this->email->to, $this->email->subject, $this->email->message)->png();
        return $this->view('emails.message')
                    ->with(['qr'=> $qr]);
        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()
                    ->addTextHeader('Laravel-Email', 'LaravelEmail');
        });
    }
}
