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
        foreach (\App\Models\PaymentCart::where('finish_payment', true)->get() as $data) {
            $item = $data->getCart;
            $item_name = $item->subkategori_id != null ? $item->getSubKategori->getTranslation('name', 'en') : $item->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($item_name));
            $initial = '';
            foreach ($trim_name as $key => $trimItem) {
                $name = substr($trim_name[$key], 0, 1);
                $initial = $initial . $name;
            }
            $uni_code = strtoupper(uniqid($initial)) . now()->timestamp;

            $arr = \App\Support\StatusProgress::ALL;
            \App\Models\Order::create([
                'cart_id' => $item->id,
                'progress_status' => $arr[array_rand($arr)],
                'uni_code' => $uni_code
            ]);
        }
    }
}
