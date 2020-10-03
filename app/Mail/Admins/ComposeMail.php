<?php

namespace App\Mail\Admins;

use App\Models\PromoCode;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComposeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $promo = PromoCode::where('promo_code', $data['promo_code'])->first();

        $this->subject($data['subject']);

        if (count($data['attachments']) > 0) {
            foreach ($data['attachments'] as $filename) {
                $this->attach(public_path('storage/admins/attachments/' . $filename));
            }
        }

        return $this->from(env('MAIL_USERNAME'), __('lang.title'))
            ->view('emails.admins.compose', compact('data', 'promo'));
    }
}
