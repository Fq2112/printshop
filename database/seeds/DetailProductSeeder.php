<?php

use Illuminate\Database\Seeder;

class DetailProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\DetailProduct::create([// kartu nama Standar
            'cluster_kategoris_id' => 1,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['6'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_edge' => true,
            'edge_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'unit_id' => 6,
            'is_design' => true
        ]);

        \App\Models\DetailProduct::create([// kartu nama Premium
            'cluster_kategoris_id' => 2,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['6'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_edge' => true,
            'edge_ids' => ['1', '2'],
            'unit_id' => 6,
            'is_design' => true
        ]);


        \App\Models\DetailProduct::create([// kartu nama Esklusif
            'cluster_kategoris_id' => 3,
            'is_material' => true,
            'material_ids' => ['5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['6'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_edge' => true,
            'edge_ids' => ['1', '2'],
            'is_finishing' => true,
            'finishing_ids' => ['19'],
            'unit_id' => 6,
            'is_design' => true
        ]);

        \App\Models\DetailProduct::create([// kartu Undangan Standar
            'cluster_kategoris_id' => 4,
            'is_material' => true,
            'material_ids' => ['2', '3', ],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['1','2','3'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// kartu Undangan Premium
            'cluster_kategoris_id' => 5,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_edge' => true,
            'edge_ids' => ['1', '2'],
            'is_folding' => true,
            'folding_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([ // Kartu Terima  kasih Std
            'cluster_kategoris_id' => 6,
            'is_material' => true,
            'material_ids' => ['2', '3', ],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([ // Kartu Terima kasih Prem
            'cluster_kategoris_id' => 7,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);
        \App\Models\DetailProduct::create([// ID Card Todo Revision need
            'cluster_kategoris_id' => 8,
            'is_material' => true,
            'material_ids' => ['39'],
            'is_size' => true,
            'size_ids' => ['50'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
//            'is_finishing' => true,
//            'finishing_ids' => ['19'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// RF ID
            'cluster_kategoris_id' => 9,
            'is_material' => true,
            'material_ids' => ['39'],
            'is_size' => true,
            'size_ids' => ['50'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// kartu Ucapan STD
            'cluster_kategoris_id' => 10,
            'is_material' => true,
            'material_ids' => ['2', '3', ],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['1','2','3'],
            'unit_id' => 1,
            'is_design' => true
        ]);


        \App\Models\DetailProduct::create([// kartu Ucapan Prem
            'cluster_kategoris_id' => 11,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
            'is_design' => true
        ]);


        \App\Models\DetailProduct::create([// kartu Stamp Flat
            'cluster_kategoris_id' => 12,
            'is_material' => true,
            'material_ids' => ['4'],
            'is_size' => true,
            'size_ids' => ['6'],
            'is_side' => true,
            'side_ids' => ['2'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// kartu Stamp Lipat
            'cluster_kategoris_id' => 13,
            'is_material' => true,
            'material_ids' => ['4'],
            'is_size' => true,
            'size_ids' => ['6'],
            'is_side' => true,
            'side_ids' => ['2'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// kartu Pos STD
            'cluster_kategoris_id' => 14,
            'is_material' => true,
            'material_ids' => ['4'],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1','2'],
            'is_color' => true,
            'color_ids' => ['1','2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// kartu Pos PREM
            'cluster_kategoris_id' => 15,
            'is_material' => true,
            'material_ids' => ['47','48'],
            'is_size' => true,
            'size_ids' => ['10','11'],
            'is_side' => true,
            'side_ids' => ['1','2'],
            'is_color' => true,
            'color_ids' => ['1','2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// KOP surat STD
            'cluster_kategoris_id' => 16,
            'is_material' => true,
            'material_ids' => ['9','10'],
            'is_size' => true,
            'size_ids' => ['9','12'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// KOP surat PREM
            'cluster_kategoris_id' => 17,
            'is_material' => true,
            'material_ids' => ['49',],
            'is_size' => true,
            'size_ids' => ['9','12'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([//Amplop Dl
            'cluster_kategoris_id' => 18,
            'is_material' => true,
            'material_ids' => ['10',],
            'is_size' => true,
            'size_ids' => ['62'],
            'is_side' => true,
            'side_ids' => ['1','2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// kartu nama Esklusif
            'cluster_kategoris_id' => 19,
            'is_material' => true,
            'material_ids' => ['9',],
            'is_size' => true,
            'size_ids' => ['12'],
            'is_side' => true,
            'side_ids' => ['1','2'],
            'unit_id' => 1,
        ]);

    }
}
