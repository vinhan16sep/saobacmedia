<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $email;
    protected $message;
    public $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $phone, $email, $message = null)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact', [
            "name" => $this->name, 
            "phone" => $this->phone, 
            "email" => $this->email, 
            "content" => $this->message
        ])->subject($this->subject);
    }
}
