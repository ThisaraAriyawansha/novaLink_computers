<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoiceData;
    public $invoiceHtml;

    public function __construct($invoiceData, $invoiceHtml)
    {
        $this->invoiceData = $invoiceData;
        $this->invoiceHtml = $invoiceHtml;
    }

    public function build()
    {
        $pdf = PDF::loadHTML($this->invoiceHtml);
        
        return $this->from('fueltrixteam@gmail.com', 'Udarata Computers Notifications')
                    ->subject('Your Invoice from Udarata Computers #' . $this->invoiceData['invoiceNumber'])
                    ->view('emails.invoice')
                    ->attachData($pdf->output(), 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}