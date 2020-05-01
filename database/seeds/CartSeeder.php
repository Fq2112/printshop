<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Accept' => 'application/json',
                'key' => '7a5350ebe62d80bfc367071ba78ecd84'
            ],
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        foreach (\App\User::all() as $user) {
            for ($i = 1; $i < 5; $i++) {
                $address = \App\Models\Address::where('user_id', $user->id)->inRandomOrder()->first();
                $shipping = $client->post('https://api.rajaongkir.com/starter/cost', [
                    'form_params' => [
                        'origin' => 444,
                        'destination' => $address->city_id,
                        'weight' => 2,
                        'courier' => 'jne'
                    ]
                ]);

                $ongkir = 0;
                $etd = 'n/a';
                foreach (json_decode($shipping->getBody()->getContents(), true) as $row) {
                    foreach ($row['results'][0]['costs'] as $val) {
                        if ($val['service'] == 'REG' || $val['service'] == 'CTCYES') {
                            $ongkir = $val['cost'][0]['value'];
                            $etd = $val['cost'][0]['etd'];
                        }
                    }
                }

                if ($etd == 'n/a') {
                    $ongkir = 78000;
                    $etd = '10+';
                    $received_date = now()->addDays(3 + str_replace('+', '', $etd))->format('Y-m-d');
                } else {
                    if (strpos($etd, '+')) {
                        $received_date = now()->addDays(3 + str_replace('+', '', $etd))->format('Y-m-d');
                    } else {
                        $received_date = now()->addDays(3 + substr($etd, -1))->format('Y-m-d');
                    }
                }

                $qty = rand(1, 100);
                $total = ($qty * 25000) + $ongkir;

                $cluster = \App\Models\ClusterKategori::inRandomOrder()->first();
                \App\Models\Cart::create([
                    'user_id' => $user->id,
                    'cluster_id' => $cluster->id,
                    'address_id' => $address->id,
                    'qty' => $qty,
                    'price_pcs' => 25000,
                    'production_finished' => now()->addDays(3)->format('Y-m-d'),
                    'ongkir' => $ongkir,
                    'delivery_duration' => $etd,
                    'received_date' => $received_date,
                    'total' => $total,

                    'material_id' => $cluster->getClusterSpecs->material_ids == null ? null : $cluster->getClusterSpecs->material_ids[0],
                    'type_id' => $cluster->getClusterSpecs->type_ids == null ? null : $cluster->getClusterSpecs->type_ids[0],
                    'balance_id' => $cluster->getClusterSpecs->balance_ids == null ? null : $cluster->getClusterSpecs->balance_ids[0],
                    'page_id' => $cluster->getClusterSpecs->page_ids == null ? null : $cluster->getClusterSpecs->page_ids[0],
                    'copies_id' => $cluster->getClusterSpecs->copies_ids == null ? null : $cluster->getClusterSpecs->copies_ids[0],
                    'size_id' => $cluster->getClusterSpecs->size_ids == null ? null : $cluster->getClusterSpecs->size_ids[0],
                    'lamination_id' => $cluster->getClusterSpecs->lamination_ids == null ? null : $cluster->getClusterSpecs->lamination_ids[0],
                    'side_id' => $cluster->getClusterSpecs->side_ids == null ? null : $cluster->getClusterSpecs->side_ids[0],
                    'edge_id' => $cluster->getClusterSpecs->edge_ids == null ? null : $cluster->getClusterSpecs->edge_ids[0],
                    'color_id' => $cluster->getClusterSpecs->color_ids == null ? null : $cluster->getClusterSpecs->color_ids[0],
                    'finishing_id' => $cluster->getClusterSpecs->finishing_ids == null ? null : $cluster->getClusterSpecs->finishing_ids[0],
                    'folding_id' => $cluster->getClusterSpecs->folding_ids == null ? null : $cluster->getClusterSpecs->folding_ids[0],
                    'front_side_id' => $cluster->getClusterSpecs->front_side_ids == null ? null : $cluster->getClusterSpecs->front_side_ids[0],
                    'right_side_id' => $cluster->getClusterSpecs->right_side_ids == null ? null : $cluster->getClusterSpecs->right_side_ids[0],
                    'left_side_id' => $cluster->getClusterSpecs->left_side_ids == null ? null : $cluster->getClusterSpecs->left_side_ids[0],
                    'back_side_id' => $cluster->getClusterSpecs->back_side_ids == null ? null : $cluster->getClusterSpecs->back_side_ids[0],
                    'front_cover_id' => $cluster->getClusterSpecs->front_cover_ids == null ? null : $cluster->getClusterSpecs->front_cover_ids[0],
                    'back_cover_id' => $cluster->getClusterSpecs->back_cover_ids == null ? null : $cluster->getClusterSpecs->back_cover_ids[0],
                    'binding_id' => $cluster->getClusterSpecs->binding_ids == null ? null : $cluster->getClusterSpecs->binding_ids[0],
                    'print_method_id' => $cluster->getClusterSpecs->print_method_ids == null ? null : $cluster->getClusterSpecs->print_method_ids[0],
                    'side_cover_id' => $cluster->getClusterSpecs->side_cover_ids == null ? null : $cluster->getClusterSpecs->side_cover_ids[0],
                    'cover_lamination_id' => $cluster->getClusterSpecs->cover_lamination_ids == null ? null : $cluster->getClusterSpecs->cover_lamination_ids[0],
                    'lid_id' => $cluster->getClusterSpecs->lid_ids == null ? null : $cluster->getClusterSpecs->lid_ids[0],
                    'material_cover_id' => $cluster->getClusterSpecs->material_cover_ids == null ? null : $cluster->getClusterSpecs->material_cover_ids[0],
                    'orientation_id' => $cluster->getClusterSpecs->orientation_ids == null ? null : $cluster->getClusterSpecs->orientation_ids[0],
                    'extra_id' => $cluster->getClusterSpecs->extra_ids == null ? null : $cluster->getClusterSpecs->extra_ids[0],
                    'holder_id' => $cluster->getClusterSpecs->holder_ids == null ? null : $cluster->getClusterSpecs->holder_ids[0],
                    'material_color_id' => $cluster->getClusterSpecs->material_color_ids == null ? null : $cluster->getClusterSpecs->material_color_ids[0],

                    'link' => \Faker\Factory::create()->imageUrl(),

                    'created_at' => now()->subMonths(rand(1, 5)),
                    'updated_at' => now()->subMonths(rand(1, 5)),
                ]);

                $subkat = \App\Models\SubKategori::doesnthave('getCluster')->inRandomOrder()->first();
                \App\Models\Cart::create([
                    'user_id' => $user->id,
                    'subkategori_id' => $subkat->id,
                    'address_id' => $address->id,
                    'qty' => $qty,
                    'price_pcs' => 25000,
                    'production_finished' => now()->addDays(3)->format('Y-m-d'),
                    'ongkir' => $ongkir,
                    'delivery_duration' => $etd,
                    'received_date' => $received_date,
                    'total' => $total,

                    'material_id' => $subkat->getSubkatSpecs->material_ids == null ? null : $subkat->getSubkatSpecs->material_ids[0],
                    'type_id' => $subkat->getSubkatSpecs->type_ids == null ? null : $subkat->getSubkatSpecs->type_ids[0],
                    'balance_id' => $subkat->getSubkatSpecs->balance_ids == null ? null : $subkat->getSubkatSpecs->balance_ids[0],
                    'page_id' => $subkat->getSubkatSpecs->page_ids == null ? null : $subkat->getSubkatSpecs->page_ids[0],
                    'copies_id' => $subkat->getSubkatSpecs->copies_ids == null ? null : $subkat->getSubkatSpecs->copies_ids[0],
                    'size_id' => $subkat->getSubkatSpecs->size_ids == null ? null : $subkat->getSubkatSpecs->size_ids[0],
                    'lamination_id' => $subkat->getSubkatSpecs->lamination_ids == null ? null : $subkat->getSubkatSpecs->lamination_ids[0],
                    'side_id' => $subkat->getSubkatSpecs->side_ids == null ? null : $subkat->getSubkatSpecs->side_ids[0],
                    'edge_id' => $subkat->getSubkatSpecs->edge_ids == null ? null : $subkat->getSubkatSpecs->edge_ids[0],
                    'color_id' => $subkat->getSubkatSpecs->color_ids == null ? null : $subkat->getSubkatSpecs->color_ids[0],
                    'finishing_id' => $subkat->getSubkatSpecs->finishing_ids == null ? null : $subkat->getSubkatSpecs->finishing_ids[0],
                    'folding_id' => $subkat->getSubkatSpecs->folding_ids == null ? null : $subkat->getSubkatSpecs->folding_ids[0],
                    'front_side_id' => $subkat->getSubkatSpecs->front_side_ids == null ? null : $subkat->getSubkatSpecs->front_side_ids[0],
                    'right_side_id' => $subkat->getSubkatSpecs->right_side_ids == null ? null : $subkat->getSubkatSpecs->right_side_ids[0],
                    'left_side_id' => $subkat->getSubkatSpecs->left_side_ids == null ? null : $subkat->getSubkatSpecs->left_side_ids[0],
                    'back_side_id' => $subkat->getSubkatSpecs->back_side_ids == null ? null : $subkat->getSubkatSpecs->back_side_ids[0],
                    'front_cover_id' => $subkat->getSubkatSpecs->front_cover_ids == null ? null : $subkat->getSubkatSpecs->front_cover_ids[0],
                    'back_cover_id' => $subkat->getSubkatSpecs->back_cover_ids == null ? null : $subkat->getSubkatSpecs->back_cover_ids[0],
                    'binding_id' => $subkat->getSubkatSpecs->binding_ids == null ? null : $subkat->getSubkatSpecs->binding_ids[0],
                    'print_method_id' => $subkat->getSubkatSpecs->print_method_ids == null ? null : $subkat->getSubkatSpecs->print_method_ids[0],
                    'side_cover_id' => $subkat->getSubkatSpecs->side_cover_ids == null ? null : $subkat->getSubkatSpecs->side_cover_ids[0],
                    'cover_lamination_id' => $subkat->getSubkatSpecs->cover_lamination_ids == null ? null : $subkat->getSubkatSpecs->cover_lamination_ids[0],
                    'lid_id' => $subkat->getSubkatSpecs->lid_ids == null ? null : $subkat->getSubkatSpecs->lid_ids[0],
                    'material_cover_id' => $subkat->getSubkatSpecs->material_cover_ids == null ? null : $subkat->getSubkatSpecs->material_cover_ids[0],
                    'orientation_id' => $subkat->getSubkatSpecs->orientation_ids == null ? null : $subkat->getSubkatSpecs->orientation_ids[0],
                    'extra_id' => $subkat->getSubkatSpecs->extra_ids == null ? null : $subkat->getSubkatSpecs->extra_ids[0],
                    'holder_id' => $subkat->getSubkatSpecs->holder_ids == null ? null : $subkat->getSubkatSpecs->holder_ids[0],
                    'material_color_id' => $subkat->getSubkatSpecs->material_color_ids == null ? null : $subkat->getSubkatSpecs->material_color_ids[0],

                    'link' => \Faker\Factory::create()->imageUrl(),

                    'created_at' => now()->subMonths(rand(1, 5)),
                    'updated_at' => now()->subMonths(rand(1, 5)),
                ]);
            }
        }
    }
}
