<?php

namespace App\Mail\Users;

use App\Models\PaymentCart;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code, $check, $data, $payment, $filename, $instruction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $check, $data, $payment, $filename, $instruction)
    {
        $this->code = $code;
        $this->check = $check;
        $this->data = $data;
        $this->payment = $payment;
        $this->filename = $filename;
        $this->instruction = $instruction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $check = $this->check;
        $data = $this->data;
        $payment = $this->payment;
        $code = $this->code;

        if ($check->finish_payment == false) {
            $subject = __('lang.mail.subject.unpaid', ['type' => strtoupper(str_replace('_', ' ', $payment['type'])), 'code' => $code]);
        } else {
            $subject = __('lang.mail.subject.paid', ['code' => $code,
                'datetime' => Carbon::parse($check->created_at)->formatLocalized('%d %B %Y – %H:%M')]);
        }

        return $this->from(env('MAIL_USERNAME'), __('lang.title'))->subject($subject)
            ->view('emails.users.invoice', compact('code', 'data', 'check', 'payment'))
            ->attach(public_path('storage/users/order/invoice/' . $check->user_id . '/' . $this->filename))
            ->attach(public_path('storage/users/order/invoice/' . $check->user_id . '/' . $this->instruction));
    }
}
