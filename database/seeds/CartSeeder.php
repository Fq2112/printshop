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
            for ($i = 0; $i < 10; $i++) {
                $qty = rand(1, 20);

                $cluster = \App\Models\ClusterKategori::inRandomOrder()->first();
                $price_pcs = $this->specs($cluster->getClusterSpecs);
                \App\Models\Cart::create([
                    'user_id' => $user->id,
                    'cluster_id' => $cluster->id,
                    'qty' => $qty,
                    'price_pcs' => $price_pcs,
                    'total' => ($qty * $price_pcs),

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
                    'note' => rand(0, 1) ? \Faker\Factory::create()->paragraph : null,
                    'isCheckout' => rand(0, 1) ? true : false,

                    'created_at' => now()->subMonths(rand(1, 5)),
                    'updated_at' => now()->subMonths(rand(1, 5)),
                ]);

                $subkat = \App\Models\SubKategori::doesnthave('getCluster')->inRandomOrder()->first();
                $price_pcs = $this->specs($subkat->getSubkatSpecs);
                \App\Models\Cart::create([
                    'user_id' => $user->id,
                    'subkategori_id' => $subkat->id,
                    'qty' => $qty,
                    'price_pcs' => $price_pcs,
                    'total' => ($qty * $price_pcs),

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
                    'note' => rand(0, 1) ? \Faker\Factory::create()->paragraph : null,
                    'isCheckout' => rand(0, 1) ? true : false,

                    'created_at' => now()->subMonths(rand(1, 5)),
                    'updated_at' => now()->subMonths(rand(1, 5)),
                ]);
            }
        }
    }

    private function specs($specs)
    {
        $price_pcs = $specs->price;
        if ($specs->is_type == true) {
            $price_pcs += \App\Models\TypeProduct::whereIn('id', $specs->type_ids)->first()->price;
        }
        if ($specs->is_material_cover == true) {
            $price_pcs += \App\Models\Material::whereIn('id', $specs->material_cover_ids)->first()->price;
        }
        if ($specs->is_side_cover == true) {
            $price_pcs += \App\Models\Side::whereIn('id', $specs->side_cover_ids)->first()->price;
        }
        if ($specs->is_cover_lamination == true) {
            $price_pcs += \App\Models\Lamination::whereIn('id', $specs->cover_lamination_ids)->first()->price;
        }
        if ($specs->is_material == true) {
            $price_pcs += \App\Models\Material::whereIn('id', $specs->material_ids)->first()->price;
        }
        if ($specs->is_material_color == true) {
            $price_pcs += \App\Models\Colors::whereIn('id', $specs->material_color_ids)->first()->price;
        }
        if ($specs->is_color == true) {
            $price_pcs += \App\Models\Colors::whereIn('id', $specs->color_ids)->first()->price;
        }
        if ($specs->is_print_method == true) {
            $price_pcs += \App\Models\PrintingMethods::whereIn('id', $specs->print_method_ids)->first()->price;
        }
        if ($specs->is_size == true) {
            $price_pcs += \App\Models\Size::whereIn('id', $specs->size_ids)->first()->price;
        }
        if ($specs->is_side == true) {
            $price_pcs += \App\Models\Side::whereIn('id', $specs->side_ids)->first()->price;
        }
        if ($specs->is_holder == true) {
            $price_pcs += \App\Models\Finishing::whereIn('id', $specs->holder_ids)->first()->price;
        }
        if ($specs->is_lid == true) {
            $price_pcs += \App\Models\Lid::whereIn('id', $specs->lid_ids)->first()->price;
        }
        if ($specs->is_edge == true) {
            $price_pcs += \App\Models\Edge::whereIn('id', $specs->edge_ids)->first()->price;
        }
        if ($specs->is_folding == true) {
            $price_pcs += \App\Models\Folding::whereIn('id', $specs->folding_ids)->first()->price;
        }
        if ($specs->is_front_side == true) {
            $price_pcs += \App\Models\Front::whereIn('id', $specs->front_side_ids)->first()->price;
        }
        if ($specs->is_back_side == true) {
            $price_pcs += \App\Models\BackSide::whereIn('id', $specs->back_side_ids)->first()->price;
        }
        if ($specs->is_right_side == true) {
            $price_pcs += \App\Models\RightLeftSide::whereIn('id', $specs->right_side_ids)->first()->price;
        }
        if ($specs->is_left_side == true) {
            $price_pcs += \App\Models\RightLeftSide::whereIn('id', $specs->left_side_ids)->first()->price;
        }
        if ($specs->is_balance == true) {
            $price_pcs += \App\Models\Balance::whereIn('id', $specs->balance_ids)->first()->price;
        }
        if ($specs->is_copies == true) {
            $price_pcs += \App\Models\Copies::whereIn('id', $specs->copies_ids)->first()->price;
        }
        if ($specs->is_page == true) {
            $price_pcs += \App\Models\Pages::whereIn('id', $specs->page_ids)->first()->price;
        }
        if ($specs->is_front_cover == true) {
            $price_pcs += \App\Models\Material::whereIn('id', $specs->front_cover_ids)->first()->price;
        }
        if ($specs->is_back_cover == true) {
            $price_pcs += \App\Models\Material::whereIn('id', $specs->back_cover_ids)->first()->price;
        }
        if ($specs->is_orientation == true) {
            $price_pcs += \App\Models\Finishing::whereIn('id', $specs->orientation_ids)->first()->price;
        }
        if ($specs->is_binding == true) {
            $price_pcs += \App\Models\Finishing::whereIn('id', $specs->binding_ids)->first()->price;
        }
        if ($specs->is_lamination == true) {
            $price_pcs += \App\Models\Lamination::whereIn('id', $specs->lamination_ids)->first()->price;
        }
        if ($specs->is_finishing == true) {
            $price_pcs += \App\Models\Finishing::whereIn('id', $specs->finishing_ids)->first()->price;
        }
        if ($specs->is_extra == true) {
            $price_pcs += \App\Models\Finishing::whereIn('id', $specs->extra_ids)->first()->price;
        }

        return ceil($price_pcs);
    }
}
