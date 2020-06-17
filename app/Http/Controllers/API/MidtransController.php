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
        $carts = Cart::whereIn('id', explode(',', $request->cart_ids))
            ->orderByRaw('FIELD (id, ' . $request->cart_ids . ') ASC')->get();
        $user = User::find($carts->pluck('user_id'));
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();
        $main_address = $address != "" ? $address->address . ' - ' . $address->postal_code . ' (' . $address->getOccupancy->name . ').' : null;

        $items = [];
        foreach ($carts as $i => $cart) {
            $items[$i] = [
                'id' => $cart->id,
                'price' => $cart->price_pcs,
                'quantity' => $cart->qty,
                'name' => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name,
            ];
        }

        /*$billing_address = array(
            'first_name' => "Andri",
            'last_name' => "Litani",
            'address' => "Mangga 20",
            'city' => "Jakarta",
            'postal_code' => "16602",
            'phone' => "081122334455",
            'country_code' => 'IDN'
        );

        $shipping_address = array(
            'first_name' => "Obet",
            'last_name' => "Supriadi",
            'address' => "Manggis 90",
            'city' => "Jakarta",
            'postal_code' => "16601",
            'phone' => "08113366345",
            'country_code' => 'IDN'
        );

        $customer_details = array(
            'first_name' => "Andri",
            'last_name' => "Litani",
            'email' => "andri@litani.com",
            'phone' => "081122334455",
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address
        );*/

        return Snap::getSnapToken([
            'enabled_payments' => $this->channels,
            'transaction_details' => [
                'order_id' => $request->code,
                'gross_amount' => $request->total,
            ],
            'customer_details' => [
                'name' => $user->username . ' [' . $user->name . ']',
                'phone' => $user->getBio->phone,
                'email' => $user->email,
                'address' => $main_address,
            ],
            'item_details' => $items,
        ]);
    }
}
