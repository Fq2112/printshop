<?php

namespace App\Mail\Users;

use App\Models\PromoCode;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimOfferMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $promo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, PromoCode $promo)
    {
        $this->email = $email;
        $this->promo = $promo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->email;
        $user = User::where('email', $email)->first();
        $promo = $this->promo;

        return $this->from(env('MAIL_USERNAME'), __('lang.title'))
            ->subject(__('lang.mail.subject.claim-offer', ['disc' => $promo->discount]))
            ->view('emails.users.claim-offer', compact('email', 'user', 'promo'));
    }
}
