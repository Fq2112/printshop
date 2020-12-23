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

    public $status, $code, $data, $payment, $filename, $instruction, $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $code, $data, $payment, $filename, $instruction, $input)
    {
        $this->status = $status;
        $this->code = $code;
        $this->data = $data;
        $this->payment = $payment;
        $this->filename = $filename;
        $this->instruction = $instruction;
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $status = $this->status;
        $data = $this->data;
        $payment = $this->payment;
        $code = $this->code;
        $input = $this->input;

        if ($status == 'expired') {
            $subject = __('lang.mail.subject.expired', ['code' => $code]);
        } else {
            if ($data->finish_payment == false) {
                $subject = __('lang.mail.subject.unpaid', ['type' => strtoupper(str_replace('_', ' ', $payment['type'])), 'code' => $code]);
            } else {
                $subject = __('lang.mail.subject.paid', ['code' => $code,
                    'datetime' => Carbon::parse($data->created_at)->formatLocalized('%d %B %Y – %H:%M')]);
            }
        }

        if (!is_null($this->instruction)) {
            $this->attach(public_path('storage/users/order/invoice/' . $data->user_id . '/' . $this->instruction));
        }

        return $this->from(env('MAIL_USERNAME'), __('lang.title'))->subject($subject)
            ->view('emails.users.invoice', compact('status', 'code', 'data', 'payment', 'input'))
            ->attach(public_path('storage/users/order/invoice/' . $data->user_id . '/' . $this->filename));
    }
}
