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
        foreach (\App\Models\Cart::all() as $item) {
            $cluster_name = $item->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($cluster_name));
            $initial = '';
            foreach ($trim_name as $key =>  $trimItem ) {
                $name = substr($trim_name[$key],0,1);
                $initial = $initial.$name;
            }
            $uni_code =  strtoupper(uniqid($initial)) . $item->id;
            \App\Models\Order::create([
                'cart_id' => $item->id,
                'progress_status' => \App\Support\StatusProgress::NEW,
                'uni_code' => $uni_code
            ]);
        }
    }
}
