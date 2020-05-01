<?php

use Illuminate\Database\Seeder;

class PaymentCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Cart::whereNotNull('subkategori_id')->get()->groupBy('user_id') as $item) {
            $code = uniqid('PYM') . now()->format('dmy');
            foreach ($item->take(2) as $datum) {
                \App\Models\PaymentCart::create([
                    'user_id' => $datum->user_id,
                    'cart_id' => $datum->id,
                    'uni_code_payment' => strtoupper($code),
                    'token' => uniqid(),
                    'price_total' => $datum->total,
                    'finish_payment' => true,
                ]);

                $datum->update([
                    'isCheckout' => true
                ]);
            }
        }

        foreach (\App\Models\Cart::whereNotNull('cluster_id')->get()->groupBy('user_id') as $item) {
            $code = uniqid('PYM') . now()->format('dmy');
            foreach ($item->take(2) as $datum) {
                \App\Models\PaymentCart::create([
                    'user_id' => $datum->user_id,
                    'cart_id' => $datum->id,
                    'uni_code_payment' => strtoupper($code),
                    'token' => uniqid(),
                    'price_total' => $datum->total,
                ]);

                $datum->update([
                    'isCheckout' => true
                ]);
            }
        }
    }
}
