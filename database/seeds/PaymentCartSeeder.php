<?php

use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\StatusProgress;
use App\Models\Address;
use App\User;
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
        $client = new \GuzzleHttp\Client();
        $carts_subkat = Cart::whereNotNull('subkategori_id')->where('isCheckout', true)->get();
        $user = User::find(implode($carts_subkat->take(1)->pluck('user_id')->toArray()));
        $address = Address::where('user_id', $user->id)->inRandomOrder()->first();
        $code = strtoupper(uniqid('PYM') . now()->timestamp);
        $arr = ['bca', 'bni', 'mandiri', 'permata'];
        $payment = [
            'type' => 'bank_transfer',
            'bank' => $arr[array_rand($arr)],
            'account' => \Faker\Factory::create()->bankAccountNumber,
        ];

        $weight_subkat = 0;
        $length_subkat = 0;
        $width_subkat = 0;
        $height_subkat = 0;
        foreach ($carts_subkat as $item) {
            $weight_subkat += ($item->getSubKategori->getSubkatSpecs->weight / 1000) * $item->qty;

            if ($length_subkat < $item->getSubKategori->getSubkatSpecs->length) {
                $length_subkat = $item->getSubKategori->getSubkatSpecs->length;
            }
            if ($width_subkat < $item->getSubKategori->getSubkatSpecs->width) {
                $width_subkat = $item->getSubKategori->getSubkatSpecs->width;
            }
            $height_subkat += $item->getSubKategori->getSubkatSpecs->height;
        }

        $response_subkat = $client->get('https://sandbox-api.shipper.id/public/v1/domesticRates?apiKey=' .
            env('SHIPPER_KEY') . '&o=30149&originCoord=-7.250445,112.768845' .
            '&d=' . $address->area_id . '&destinationCoord=' . $address->lat . ',' . $address->long .
            '&wt=' . $weight_subkat . '&v=' . $carts_subkat->sum('total') .
            '&l=' . $length_subkat . '&w=' . $width_subkat . '&h=' . $height_subkat,
            ['headers' => ['Accept' => 'application/json', 'User-Agent' => 'Shipper/']]);
        $shipper_subkat = json_decode($response_subkat->getBody()->getContents(), true);
        $rate_subkat = $shipper_subkat['data']['rates']['logistic']['regular'][0];

        $data = PaymentCart::create([
            'user_id' => $user->id,
            'shipping_address' => $address->id,
            'billing_address' => $address->id,
            'cart_ids' => $carts_subkat->pluck('id')->toArray(),
            'uni_code_payment' => $code,
            'token' => uniqid(),
            'production_finished' => now()->addDays(3)->format('Y-m-d'),
            'ongkir' => $rate_subkat['finalRate'],
            'delivery_duration' => $rate_subkat['min_day'] . '-' . $rate_subkat['max_day'],
            'received_date' => now()->addDays(3 + $rate_subkat['max_day'])->format('Y-m-d'),
            'rate_id' => $rate_subkat['rate_id'],
            'rate_name' => $rate_subkat['name'] . ' ' . $rate_subkat['rate_name'],
            'rate_logo' => $rate_subkat['logo_url'],
            'price_total' => $carts_subkat->sum('total') + $rate_subkat['finalRate'],
            'finish_payment' => true
        ]);
        $input = ['rate_name' => $data->rate_name, 'rate_logo' => $data->rate_logo];
        foreach ($carts_subkat as $item) {
            $item_name = $item->subkategori_id != null ? $item->getSubKategori->getTranslation('name', 'en') : $item->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($item_name));
            $initial = '';
            foreach ($trim_name as $key => $trimItem) {
                $name = substr($trim_name[$key], 0, 1);
                $initial = $initial . $name;
            }

            Order::create([
                'payment_carts_id' => $data->id,
                'progress_status' => StatusProgress::NEW,
                'uni_code' => strtoupper(uniqid($initial)) . now()->timestamp
            ]);
        }

        $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'payment', 'input'));
        Storage::put('public/users/order/invoice/' . $user->id . '/' . $code . '.pdf', $pdf->output());

        // cluster
        $carts_clust = Cart::whereNotNull('cluster_id')->where('isCheckout', true)->get();
        $weight_clust = 0;
        $length_clust = 0;
        $width_clust = 0;
        $height_clust = 0;
        foreach ($carts_clust as $item) {
            $weight_clust += ($item->getSubKategori->getSubkatSpecs->weight / 1000) * $item->qty;

            if ($length_clust < $item->getSubKategori->getSubkatSpecs->length) {
                $length_clust = $item->getSubKategori->getSubkatSpecs->length;
            }
            if ($width_clust < $item->getSubKategori->getSubkatSpecs->width) {
                $width_clust = $item->getSubKategori->getSubkatSpecs->width;
            }
            $height_clust += $item->getSubKategori->getSubkatSpecs->height;
        }

        $response_clust = $client->get('https://sandbox-api.shipper.id/public/v1/domesticRates?apiKey=' .
            env('SHIPPER_KEY') . '&o=30149&originCoord=-7.250445,112.768845' .
            '&d=' . $address->area_id . '&destinationCoord=' . $address->lat . ',' . $address->long .
            '&wt=' . $weight_clust . '&v=' . $carts_clust->sum('total') .
            '&l=' . $length_clust . '&w=' . $width_clust . '&h=' . $height_clust,
            ['headers' => ['Accept' => 'application/json', 'User-Agent' => 'Shipper/']]);
        $shipper_clust = json_decode($response_clust->getBody()->getContents(), true);
        $rate_clust = $shipper_clust['data']['rates']['logistic']['regular'][0];

        $data = PaymentCart::create([
            'user_id' => $user->id,
            'shipping_address' => $address->id,
            'billing_address' => $address->id,
            'cart_ids' => $carts_clust->pluck('id')->toArray(),
            'uni_code_payment' => $code,
            'token' => uniqid(),
            'production_finished' => now()->addDays(3)->format('Y-m-d'),
            'ongkir' => $rate_clust['finalRate'],
            'delivery_duration' => $rate_clust['min_day'] . '-' . $rate_clust['max_day'],
            'received_date' => now()->addDays(3 + $rate_clust['max_day'])->format('Y-m-d'),
            'rate_id' => $rate_clust['rate_id'],
            'rate_name' => $rate_clust['name'] . ' ' . $rate_clust['rate_name'],
            'rate_logo' => $rate_clust['logo_url'],
            'price_total' => $carts_clust->sum('total') + $rate_clust['finalRate'],
            'finish_payment' => true
        ]);
        $input = ['rate_name' => $data->rate_name, 'rate_logo' => $data->rate_logo];
        foreach ($carts_clust as $item) {
            $item_name = $item->subkategori_id != null ? $item->getSubKategori->getTranslation('name', 'en') : $item->getCluster->getTranslation('name', 'en');
            $trim_name = explode(' ', trim($item_name));
            $initial = '';
            foreach ($trim_name as $key => $trimItem) {
                $name = substr($trim_name[$key], 0, 1);
                $initial = $initial . $name;
            }

            Order::create([
                'payment_carts_id' => $data->id,
                'progress_status' => StatusProgress::NEW,
                'uni_code' => strtoupper(uniqid($initial)) . now()->timestamp
            ]);
        }

        $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'payment', 'input'));
        Storage::put('public/users/order/invoice/' . $user->id . '/' . $code . '.pdf', $pdf->output());
    }
}
