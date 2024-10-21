<?php

namespace App\Jobs;

use App\Mail\ContactEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $email;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $message = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->message = $message;
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
        $subject = "Bạn có yêu cầu liên hệ mới tại website $domain!";

        $emailAdmin = new ContactEmail($subject, $this->name, $this->phone, $this->email, $this->message);
        Mail::to(config("mail.admin"))->send($emailAdmin);
    }
}
