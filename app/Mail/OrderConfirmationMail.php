<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $orderDetails;

    public function __construct($customer, $orderDetails)
    {
        $this->customer = $customer;
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Order Confirmation')
                    ->view('emails.order_email')
                    ->with([
                        'customer' => $this->customer,
                        'orderDetails' => $this->orderDetails,
                    ]);
    }
}
