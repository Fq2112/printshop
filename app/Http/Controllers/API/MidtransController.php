<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\User;
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
        $this->channels = ["credit_card", "bca_va", "echannel", "bni_va", "permata_va", "other_va", "gopay", "indomaret", "alfamart"];
    }

    public function snap(Request $request)
    {
        $user = User::find($request->user_id);
        $split_name = explode(" ", $user->name);
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();
        $main_address = $address != "" ? $address->address . ' - ' . $address->postal_code . ' (' . $address->getOccupancy->name . ').' : null;

        $billing = Address::find($request->billing_address);
        $split_bill_name = explode(" ", $billing->name);

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
                    'city' => $billing->getCity->getProvince->name . ', ' . $billing->getCity->name,
                    'postal_code' => $billing->postal_code,
                    'phone' => $billing->phone,
                    'country_code' => 'IDN'
                ],
            ],
        ]);
    }
}
