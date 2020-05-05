<?php

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PaymentCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Cart::whereNotNull('subkategori_id')->where('isCheckout', true)->get()->groupBy('user_id') as $item) {
            $code = strtoupper(uniqid('PYM') . now()->timestamp);
            foreach ($item as $datum) {
                $address = \App\Models\Address::where('user_id', $datum->user_id)->first();

                \App\Models\PaymentCart::create([
                    'user_id' => $datum->user_id,
                    'address_id' => $address->id,
                    'cart_id' => $datum->id,
                    'uni_code_payment' => $code,
                    'token' => uniqid(),
                    'price_total' => $datum->total,
                    'finish_payment' => true,
                ]);

                $datum->update(['isCheckout' => true]);
            }

            $check = \App\Models\PaymentCart::where('uni_code_payment', $code)->where('user_id', $item->take(1)->toArray()[0]['user_id'])->orderByDesc('id')->first();
            $data = \App\Models\PaymentCart::where('uni_code_payment', $code)->where('user_id', $check->user_id)->orderByDesc('id')->get();

            $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'check'));
            Storage::put('public/users/order/invoice/' . $check->user_id . '/' . $code . '.pdf', $pdf->output());
        }

        foreach (\App\Models\Cart::whereNotNull('cluster_id')->where('isCheckout', true)->get()->groupBy('user_id') as $item) {
            $code = strtoupper(uniqid('PYM') . now()->timestamp);
            foreach ($item as $datum) {
                $address = \App\Models\Address::where('user_id', $datum->user_id)->first();

                \App\Models\PaymentCart::create([
                    'user_id' => $datum->user_id,
                    'address_id' => $address->id,
                    'cart_id' => $datum->id,
                    'uni_code_payment' => $code,
                    'token' => uniqid(),
                    'price_total' => $datum->total,
                ]);

                $datum->update(['isCheckout' => true]);
            }

            $check = \App\Models\PaymentCart::where('uni_code_payment', $code)->where('user_id', $item->take(1)->toArray()[0]['user_id'])->orderByDesc('id')->first();
            $data = \App\Models\PaymentCart::where('uni_code_payment', $code)->where('user_id', $check->user_id)->orderByDesc('id')->get();

            $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'check'));
            Storage::put('public/users/order/invoice/' . $check->user_id . '/' . $code . '.pdf', $pdf->output());
        }
    }
}
