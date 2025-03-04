<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetUrl;
    /**
     * Create a new message instance.
     */
    public function __construct($resetUrl)
    {
        $this->resetUrl = $resetUrl;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // dd($this->template);
        return $this->subject('Reset Your Password')
                    ->view('emails.forget-mail')
                    ->with([
                        'buttonLink' => $this->resetUrl,
                    ])
                    ->subject('Reset Your Password');
    }
}
