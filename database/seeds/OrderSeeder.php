<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Cart::all() as $item){
            \App\Models\Order::create([
                'cart_id' => $item->id,
                'progress_status' => \App\Support\StatusProgress::NEW
            ]);
        }
    }
}
