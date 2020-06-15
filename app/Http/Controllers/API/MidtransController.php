<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

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
        // $this->channels = ['credit_card', 'cimb_clicks', 'mandiri_clickpay', 'echannel'];
    }

    public function snap(Request $request)
    {
        /*// Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 94000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => 18000,
            'quantity' => 3,
            'name' => "Apple"
        );

        // Optional
        $item2_details = array(
            'id' => 'a2',
            'price' => 20000,
            'quantity' => 2,
            'name' => "Orange"
        );

        // Optional
        $item_details = array($item1_details, $item2_details);

        // Optional
        $billing_address = array(
            'first_name' => "Andri",
            'last_name' => "Litani",
            'address' => "Mangga 20",
            'city' => "Jakarta",
            'postal_code' => "16602",
            'phone' => "081122334455",
            'country_code' => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name' => "Obet",
            'last_name' => "Supriadi",
            'address' => "Manggis 90",
            'city' => "Jakarta",
            'postal_code' => "16601",
            'phone' => "08113366345",
            'country_code' => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name' => "Andri",
            'last_name' => "Litani",
            'email' => "andri@litani.com",
            'phone' => "081122334455",
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $channels,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );*/

        return Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $request->code,
                'gross_amount' => ceil($request->total),
            ]
        ]);
    }
}
