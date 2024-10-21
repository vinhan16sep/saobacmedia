<?php

namespace App\Mail;

use App\Models\Gift;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $quantity;
    protected $address;
    protected $gift;
    public $subject;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $quantity, $phone, $address, $gift)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->phone = $phone;
        $this->quantity = $quantity;
        $this->address = $address;
        $this->gift = $gift;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.gift', [
            "name" => $this->name, 
            "phone" => $this->phone, 
            "quantity" => $this->quantity, 
            "address" => $this->address,
            "gift" => $this->gift
        ])->subject($this->subject);
    }
}
