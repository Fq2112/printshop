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
        foreach (\App\Models\Cart::whereNotNull('cluster_id')->get()->groupBy('user_id') as $item) {
            foreach ($item as $datum) {
                $code = uniqid('PYM') . now()->format('dmy');
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
