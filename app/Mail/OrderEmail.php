<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    public $subject;
    public $is_admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $subject, $is_admin)
    {
        $this->order = $order;
        $this->subject = $subject;
        $this->is_admin = $is_admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order', ["order" => $this->order, "is_admin" => $this->is_admin])->subject($this->subject);
    }
}
