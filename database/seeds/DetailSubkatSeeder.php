<?php

use Illuminate\Database\Seeder;

class DetailSubkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail1 = \App\Models\DetailSubkat::create([// E Card
            'subkategori_id' => 8,
            'is_size' => true,
            'size_ids' => ['50'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
        ]);

        $detail2 = \App\Models\DetailSubkat::create([//NCR
            'subkategori_id' => 13,
            'is_material' => true,
            'material_ids' => ['11'],
            'is_size' => true,
            'size_ids' => ['7', '9', '10', '11', '12'],
            'is_side' => true,
            'side_ids' => ['1'],
        ]);

        $detail3 = \App\Models\DetailSubkat::create([ //cetak Dokumen
            'subkategori_id' => 14,
            'is_material' => true,
            'material_ids' => ['10'],
            'is_size' => true,
            'size_ids' => ['9', '10', '12'],
        ]);
        $detail4 = \App\Models\DetailSubkat::create([//Food Wrapper
            'subkategori_id' => 25,
            'is_material' => true,
            'material_ids' => ['25'],
            'is_size' => true,
            'size_ids' => ['39', '40'],
            'is_side' => true,
            'side_ids' => ['1'],
        ]);
        $detail5 = \App\Models\DetailSubkat::create([ //Placement
            'subkategori_id' => 26,
            'is_material' => true,
            'material_ids' => ['9', '10', '26'],
            'is_size' => true,
            'size_ids' => ['8', '9'],
        ]);
        $detail6 = \App\Models\DetailSubkat::create([ //Sealer
            'subkategori_id' => 27,
            'is_side' => true,
            'side_ids' => ['1'],
        ]);
        $detail7 = \App\Models\DetailSubkat::create([ //Wobbler
            'subkategori_id' => 40,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'is_size' => true,
            'size_ids' => ['48'],
        ]);
        $detail8 = \App\Models\DetailSubkat::create([//Portable Backdrop
            'subkategori_id' => 41,
            'is_material' => true,
            'material_ids' => ['30'],
            'is_size' => true,
            'size_ids' => ['58', '59'],
        ]);
        $detail9 = \App\Models\DetailSubkat::create([//Meja Promosi
            'subkategori_id' => 42,
            'is_material' => true,
            'material_ids' => ['30'],
            'is_size' => true,
            'size_ids' => ['49'],
        ]);
        $detail10 = \App\Models\DetailSubkat::create([ //Pop up counter
            'subkategori_id' => 43,
            'is_material' => true,
            'material_ids' => ['30'],
            'is_size' => true,
            'size_ids' => ['60', '61'],
        ]);
        $detail11 = \App\Models\DetailSubkat::create([//KAOS
            'subkategori_id' => 47,
            'is_material' => true,
            'material_ids' => ['1'],
            'is_size' => true,
            'size_ids' => ['1', '2', '3', '4', '5'],
            'is_front_side' => true,
            'front_side_ids' => ['1', '2', '3', '4'],
            'is_back_side' => true,
            'back_side_ids' => ['1', '2', '3', '4'],
            'is_right_side' => true,
            'right_side_ids' => ['1', '2'],
            'is_left_side' => true,
            'left_side_ids' => ['1', '2'],
        ]);

    }
}
