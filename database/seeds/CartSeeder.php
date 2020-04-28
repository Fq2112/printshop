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
        foreach (\App\User::all() as $user) {
            for ($i = 1; $i < 3; $i++) {
                $cluster = \App\Models\ClusterKategori::inRandomOrder()->first();
                \App\Models\Cart::create([
                    'user_id' => $user['id'],
                    'cluster_id' => $cluster->id,
                    'address_id' => 1,
                    'qty' => rand(1,10),
                    'price_pcs' => 10000,
                    'production_finished' => now(),
                    'ongkir' => 1000,
                    'delivery_duration' => 1,
                    'received_date' => now()->subDay(3),
                    'total' => 100000,

                    'material_id' => $cluster->getClusterSpecs->material_ids ==null ? null: $cluster->getClusterSpecs->material_ids[0] ,
                    'type_id' => $cluster->getClusterSpecs->type_ids ==null ? null: $cluster->getClusterSpecs->type_ids[0],
                    'balance_id' => $cluster->getClusterSpecs->balance_ids ==null ? null: $cluster->getClusterSpecs->balance_ids[0],
                    'page_id' => $cluster->getClusterSpecs->page_ids ==null ? null: $cluster->getClusterSpecs->page_ids[0],
                    'copies_id' => $cluster->getClusterSpecs->copies_ids ==null ? null: $cluster->getClusterSpecs->copies_ids[0],
                    'size_id' => $cluster->getClusterSpecs->size_ids ==null ? null: $cluster->getClusterSpecs->size_ids[0],
                    'lamination_id' => $cluster->getClusterSpecs->lamination_ids ==null ? null: $cluster->getClusterSpecs->lamination_ids[0],
                    'side_id' => $cluster->getClusterSpecs->side_ids ==null ? null: $cluster->getClusterSpecs->side_ids[0],
                    'edge_id' => $cluster->getClusterSpecs->edge_ids ==null ? null: $cluster->getClusterSpecs->edge_ids[0],
                    'color_id' => $cluster->getClusterSpecs->color_ids ==null ? null: $cluster->getClusterSpecs->color_ids[0],
                    'finishing_id' => $cluster->getClusterSpecs->finishing_ids ==null ? null: $cluster->getClusterSpecs->finishing_ids[0],
                    'folding_id' => $cluster->getClusterSpecs->folding_ids ==null ? null: $cluster->getClusterSpecs->folding_ids[0],
                    'front_side_id' => $cluster->getClusterSpecs->front_side_ids ==null ? null: $cluster->getClusterSpecs->front_side_ids[0],
                    'right_side_id' => $cluster->getClusterSpecs->right_side_ids ==null ? null: $cluster->getClusterSpecs->right_side_ids[0],
                    'left_side_id' => $cluster->getClusterSpecs->left_side_ids ==null ? null: $cluster->getClusterSpecs->left_side_ids[0],
                    'back_side_id' => $cluster->getClusterSpecs->back_side_ids ==null ? null: $cluster->getClusterSpecs->back_side_ids[0],
                    'front_cover_id' => $cluster->getClusterSpecs->front_cover_ids ==null ? null: $cluster->getClusterSpecs->front_cover_ids[0],
                    'back_cover_id' => $cluster->getClusterSpecs->back_cover_ids ==null ? null: $cluster->getClusterSpecs->back_cover_ids[0],
                    'binding_id' => $cluster->getClusterSpecs->binding_ids ==null ? null: $cluster->getClusterSpecs->binding_ids[0],
                    'print_method_id' => $cluster->getClusterSpecs->print_method_ids ==null ? null: $cluster->getClusterSpecs->print_method_ids[0],
                    'side_cover_id' => $cluster->getClusterSpecs->side_cover_ids ==null ? null: $cluster->getClusterSpecs->side_cover_ids[0],
                    'cover_lamination_id' => $cluster->getClusterSpecs->cover_lamination_ids ==null ? null: $cluster->getClusterSpecs->cover_lamination_ids[0],
                    'lid_id' => $cluster->getClusterSpecs->lid_ids ==null ? null: $cluster->getClusterSpecs->lid_ids[0],
                    'material_cover_id' => $cluster->getClusterSpecs->material_cover_ids ==null ? null: $cluster->getClusterSpecs->material_cover_ids[0],
                    'orientation_id' => $cluster->getClusterSpecs->orientation_ids ==null ? null: $cluster->getClusterSpecs->orientation_ids[0],
                    'extra_id' => $cluster->getClusterSpecs->extra_ids ==null ? null: $cluster->getClusterSpecs->extra_ids[0],
                    'holder_id' => $cluster->getClusterSpecs->holder_ids ==null ? null: $cluster->getClusterSpecs->holder_ids[0],
                    'material_color_id' => $cluster->getClusterSpecs->material_color_ids ==null ? null: $cluster->getClusterSpecs->material_color_ids[0],
                ]);
            }
        }
    }
}
