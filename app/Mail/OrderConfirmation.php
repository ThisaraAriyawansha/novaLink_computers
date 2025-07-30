<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;
    public $customer;
    public $totalAmount;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderDetails, $customer, $totalAmount)
    {
        $this->orderDetails = $orderDetails;
        $this->customer = $customer;
        $this->totalAmount = $totalAmount;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Confirmation')
                    ->view('emails.order_email'); // Blade view for the email
    }
}





