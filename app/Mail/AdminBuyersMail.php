<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminBuyersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from('payment@asian_box.com')
            ->subject('Nouvel abonnement')
            ->with([
                'objet' => 'Nouvel abonnement',
                'content_email' => $this->details['content_email']
            ])
            ->view('emails.admin-buyers-mail');
    }
}
