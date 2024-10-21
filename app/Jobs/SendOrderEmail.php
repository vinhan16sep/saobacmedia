<?php

namespace App\Jobs;

use App\Mail\OrderEmail;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_id)
    {
        $this->order_id = $order_id;
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
        $subject = "Đơn hàng tại $domain đã được đặt!";
        $subjectAdmin = "Bạn có đơn hàng mới tại website $domain!";
        $order = Order::with(["order_items.product", "order_items.combo.products", "order_customer"])->find($this->order_id);

        $email = new OrderEmail($order, $subject, false);
        Mail::to($order->order_customer->email)->send($email);
        // if(count(Mail::failures()) === 0){
        //     // update data if send mail success order => define column update

        // }

        $emailAdmin = new OrderEmail($order, $subjectAdmin, true);
        Mail::to(config("mail.admin"))->send($emailAdmin);
        // if(count(Mail::failures()) === 0){
        //     // update data if send mail success order => define column update

        // }
    }
}
