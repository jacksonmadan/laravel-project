<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $amount;
    public $description;
    public $approvalUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount, $description, $approvalUrl)
    {
        $this->amount = $amount;
        $this->description = $description;
        $this->approvalUrl = $approvalUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.payment_request')
                    ->subject('Payment Request Approval Needed');
    }
}
