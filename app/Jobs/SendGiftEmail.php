<?php

namespace App\Jobs;

use App\Mail\GiftEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendGiftEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $quantity;
    protected $address;
    protected $gift;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $quantity, $phone, $address, $gift)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->quantity = $quantity;
        $this->address = $address;
        $this->gift = $gift;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = URL("/");
        $parse_url = parse_url($url);
        $domain = $parse_url["host"] ?? "";
        $subject = "Bạn có yêu cầu liên hệ đặt quà mới tại website $domain!";
        $emailAdmin = new GiftEmail($subject, $this->name, $this->quantity, $this->phone, $this->address, $this->gift);
        Mail::to(config("mail.admin"))->send($emailAdmin);
    }
}
