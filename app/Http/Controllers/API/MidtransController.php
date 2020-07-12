<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\Users\InvoiceMail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\StatusProgress;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use Midtrans\Transaction;

class MidtransController extends Controller
{
    public $channels;

    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY'); // Set your Merchant Server Key
        Config::$isProduction = false; // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isSanitized = true; // Set sanitization on (default)
        Config::$is3ds = true; // Set 3DS transaction for credit card to true

        // Uncomment for append and override notification URL
        // Config::$appendNotifUrl = "https://example.com";
        // Config::$overrideNotifUrl = "https://example.com";

        // Optional, remove this to display all available payment methods
        $this->channels = ["credit_card", "bca_va", "echannel", "bni_va", "permata_va", "other_va", "gopay", "indomaret", "alfamart"];
    }

    public function snap(Request $request)
    {
        app()->setLocale($request->lang);

        $user = User::find($request->user_id);
        $split_name = explode(" ", $user->name);
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();
        $main_address = $address != "" ? $address->address . ' - ' . $address->postal_code . ' (' . $address->getOccupancy->name . ').' : null;
        $shipping = Address::find($request->shipping_id);
        $split_shipping_name = explode(" ", $shipping->name);
        $billing = Address::find($request->billing_id);
        $split_bill_name = explode(" ", $billing->name);

        $carts = Cart::whereIn('id', explode(',', $request->cart_ids))
            ->orderByRaw('FIELD (id, ' . $request->cart_ids . ') ASC')->get();

        $arr_items = [];
        foreach ($carts as $i => $cart) {
            $cart_name = $cart->subkategori_id != null ? $cart->getSubKategori->getTranslation('name', 'en') : $cart->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($cart_name));
            $initial = '';
            foreach ($trim_name as $key => $trimItem) {
                $name = substr($trim_name[$key], 0, 1);
                $initial = $initial . $name;
            }

            $arr_items[$i] = [
                'id' => strtoupper(uniqid($initial)) . now()->timestamp,
                'price' => ceil($cart->price_pcs),
                'quantity' => $cart->qty,
                'name' => Str::limit(!is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name, 50),
                'category' => Str::limit(!is_null($cart->subkategori_id) ? $cart->getSubKategori->getKategori->name : $cart->getCluster->getSubKategori->getKategori->name, 50)
            ];
        }

        $arr_ship_disc = [];
        if (!is_null($request->discount)) {
            $arr_ship_disc[count($arr_items)] = [
                'id' => 'DISC-' . $request->code,
                'price' => ceil($request->discount_price * -1),
                'quantity' => 1,
                'name' => __('lang.cart.summary.discount') . ' ' . $request->discount . '%'
            ];
        }

        $arr_ship_disc[!is_null($request->discount) ? count($arr_items) + 1 : count($arr_items)] = [
            'id' => 'SHIP-' . $request->code,
            'price' => ceil($request->ongkir),
            'quantity' => 1,
            'name' => __('lang.product.form.summary.ongkir')
        ];

        return Snap::getSnapToken([
            'enabled_payments' => $this->channels,
            'transaction_details' => [
                'order_id' => $request->code,
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'first_name' => array_shift($split_name),
                'last_name' => implode(" ", $split_name),
                'phone' => $user->getBio->phone,
                'email' => $user->email,
                'address' => $main_address,
                'billing_address' => [
                    'first_name' => array_shift($split_bill_name),
                    'last_name' => implode(" ", $split_bill_name),
                    'address' => $billing->address,
                    'city' => $billing->getAreas->getSuburbs->getCities->getProvince->name . ', ' . $billing->getAreas->getSuburbs->getCities->name,
                    'postal_code' => $billing->postal_code,
                    'phone' => $billing->phone,
                    'country_code' => 'IDN'
                ],
                'shipping_address' => [
                    'first_name' => array_shift($split_shipping_name),
                    'last_name' => implode(" ", $split_shipping_name),
                    'address' => $shipping->address,
                    'city' => $shipping->getAreas->getSuburbs->getCities->getProvince->name . ', ' . $shipping->getAreas->getSuburbs->getCities->name,
                    'postal_code' => $shipping->postal_code,
                    'phone' => $shipping->phone,
                    'country_code' => 'IDN'
                ],
            ],
            'item_details' => array_merge($arr_items, $arr_ship_disc),
        ]);
    }

    public function unfinishCallback(Request $request)
    {
        app()->setLocale($request->lang);

        $data_tr = collect(Transaction::status($request->transaction_id))->toArray();
        $input = ['rate_name' => $request->rate_name, 'rate_logo' => $request->rate_logo];
        $code = $data_tr['order_id'];

        $carts = Cart::whereIn('id', explode(',', $request->cart_ids))
            ->orderByRaw('FIELD (id, ' . $request->cart_ids . ') ASC')->get();
        $user = User::find(implode($carts->take(1)->pluck('user_id')->toArray()));

        PaymentCart::firstOrCreate([
            'user_id' => $user->id,
            'shipping_address' => $request->shipping_id,
            'billing_address' => $request->billing_id,
            'cart_ids' => $carts->pluck('id')->toArray(),
            'uni_code_payment' => $code,
            'token' => uniqid(),
            'production_finished' => $request->production_finished,
            'ongkir' => $request->ongkir,
            'delivery_duration' => $request->delivery_duration,
            'received_date' => $request->received_date,
            'rate_id' => $request->rate_id,
            'rate_name' => $request->rate_name,
            'rate_logo' => $request->rate_logo,
            'price_total' => $data_tr['gross_amount'],
            'promo_code' => $request->promo_code,
            'is_discount' => !is_null($request->discount) ? 1 : 0,
            'discount' => $request->discount,
        ]);

        foreach ($carts as $cart) {
            $cart->update(['isCheckout' => true]);
        }

        $this->invoiceMail('unfinish', $code, $user, $request->pdf_url, $data_tr, $input);

        return __('lang.alert.checkout', ['qty' => count($carts), 's' => count($carts) > 1 ? 's' : '', 'code' => $code]);
    }

    public function finishCallback(Request $request)
    {
        app()->setLocale($request->lang);
        $data_tr = collect(Transaction::status($request->transaction_id))->toArray();
        $input = ['rate_name' => $request->rate_name, 'rate_logo' => $request->rate_logo];
        $code = $data_tr['order_id'];

        try {
            if (!array_key_exists('fraud_status', $data_tr) ||
                (array_key_exists('fraud_status', $data_tr) && $data_tr['fraud_status'] == 'accept')) {

                if ($data_tr['payment_type'] == 'credit_card' &&
                    ($data_tr['transaction_status'] == 'capture' || $data_tr['transaction_status'] == 'settlement')) {

                    $carts = Cart::whereIn('id', explode(',', $request->cart_ids))
                        ->orderByRaw('FIELD (id, ' . $request->cart_ids . ') ASC')->get();
                    $user = User::find(implode($carts->take(1)->pluck('user_id')->toArray()));

                    PaymentCart::firstOrCreate([
                        'user_id' => $user->id,
                        'shipping_address' => $request->shipping_id,
                        'billing_address' => $request->billing_id,
                        'cart_ids' => $carts->pluck('id')->toArray(),
                        'uni_code_payment' => $code,
                        'token' => uniqid(),
                        'production_finished' => $request->production_finished,
                        'ongkir' => $request->ongkir,
                        'delivery_duration' => $request->delivery_duration,
                        'received_date' => $request->received_date,
                        'rate_id' => $request->rate_id,
                        'rate_name' => $request->rate_name,
                        'rate_logo' => $request->rate_logo,
                        'price_total' => $data_tr['gross_amount'],
                        'promo_code' => $request->promo_code,
                        'is_discount' => !is_null($request->discount) ? 1 : 0,
                        'discount' => $request->discount,
                    ]);

                    foreach ($carts as $cart) {
                        $cart->update(['isCheckout' => true]);
                    }
                    $this->updatePayment($code);
                    $this->invoiceMail('finish', $code, $user, $request->pdf_url, $data_tr, $input);

                    return __('lang.alert.payment-success',
                        ['qty' => count($carts), 's' => count($carts) > 1 ? 's' : '', 'code' => $code]);
                }
            }

        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }

    public function notificationCallback()
    {
        $notif = new Notification();
        $data_tr = collect(Transaction::status($notif->transaction_id))->toArray();

        try {
            if (!array_key_exists('fraud_status', $data_tr) ||
                (array_key_exists('fraud_status', $data_tr) && $data_tr['fraud_status'] == 'accept')) {

                if ($data_tr['payment_type'] != 'credit_card' &&
                    ($data_tr['transaction_status'] == 'capture' || $data_tr['transaction_status'] == 'settlement')) {

                    $this->updatePayment($notif->order_id);

                    $payment_cart = PaymentCart::where('uni_code_payment', $notif->order_id)->first();
                    $input = ['rate_name' => $payment_cart->rate_name, 'rate_logo' => $payment_cart->rate_logo];
                    $user = User::find($payment_cart->user_id);
                    $this->invoiceMail('finish', $notif->order_id, $user, null, $data_tr, $input);

                    return __('lang.alert.payment-success', [
                        'qty' => count($payment_cart->cart_ids),
                        's' => count($payment_cart->cart_ids) > 1 ? 's' : '',
                        'code' => $notif->order_id
                    ]);
                }
            }

        } catch (\Exception $exception) {
            return response()->json($exception, 500);
        }
    }

    private function updatePayment($code)
    {
        $payment_cart = PaymentCart::where('uni_code_payment', $code)->first();
        $payment_cart->update(['finish_payment' => true]);
        $carts = Cart::whereIn('id', $payment_cart->cart_ids)
            ->orderByRaw('FIELD (id, ' . implode(',', $payment_cart->cart_ids) . ') ASC')->get();

        foreach ($carts as $item) {
            $item_name = $item->subkategori_id != null ? $item->getSubKategori->getTranslation('name', 'en') : $item->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($item_name));
            $initial = '';
            foreach ($trim_name as $key => $trimItem) {
                $name = substr($trim_name[$key], 0, 1);
                $initial = $initial . $name;
            }

            Order::create([
                'payment_carts_id' => $payment_cart->id,
                'progress_status' => StatusProgress::NEW,
                'uni_code' => strtoupper(uniqid($initial)) . now()->timestamp
            ]);
        }
    }

    private function invoiceMail($status, $code, $user, $pdf_url, $data_tr, $input)
    {
        $data = PaymentCart::where('uni_code_payment', $code)->first();

        if ($data_tr['payment_type'] == 'credit_card') {
            $type = $data_tr['payment_type'];
            $bank = $data_tr['card_type'];
            $account = $data_tr['masked_card'];

        } else if ($data_tr['payment_type'] == 'bank_transfer') {
            $type = $data_tr['payment_type'];

            if (array_key_exists('permata_va_number', $data_tr)) {
                $bank = 'permata';
                $account = $data_tr['permata_va_number'];
            } else {
                $bank = implode((array)$data_tr['va_numbers'][0]->bank);
                $account = implode((array)$data_tr['va_numbers'][0]->va_number);
            }

        } else if ($data_tr['payment_type'] == 'echannel') {
            $type = 'bank_transfer';
            $bank = 'mandiri';
            $account = $data_tr['bill_key'];

        } else if ($data_tr['payment_type'] == 'cstore') {
            $type = $data_tr['payment_type'];
            $bank = $data_tr['store'];
            $account = $data_tr['payment_code'];

        } else {
            $type = $data_tr['payment_type'];
            $bank = $data_tr['payment_type'];
            $account = null;
        }

        $payment = [
            'type' => $type,
            'bank' => $bank,
            'account' => $account,
        ];

        $filename = $code . '.pdf';
        $check_file = 'public/users/order/invoice/' . $user->id . '/' . $filename;
        if ($status == 'finish') {
            if (Storage::exists($check_file)) {
                Storage::delete($check_file);
            }
        }

        $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'payment', 'input'));
        Storage::put('public/users/order/invoice/' . $user->id . '/' . $filename, $pdf->output());

        if (!is_null($pdf_url)) {
            $instruction = $code . '-instruction.pdf';
            Storage::put('public/users/order/invoice/' . $user->id . '/' . $instruction, file_get_contents($pdf_url));
        } else {
            $instruction = null;
        }

        Mail::to($user->email)->send(new InvoiceMail($code, $data, $payment, $filename, $instruction, $input));
    }
}
