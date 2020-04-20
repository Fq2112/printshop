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
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// kartu Undangan Premium
            'cluster_kategoris_id' => 5,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
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
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([ // Kartu Terima kasih Prem
            'cluster_kategoris_id' => 7,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
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
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'unit_id' => 1,
            'is_design' => true
        ]);


        \App\Models\DetailProduct::create([// kartu Ucapan Prem
            'cluster_kategoris_id' => 11,
            'is_material' => true,
            'material_ids' => ['4', '5', '6', '7', '8'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
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
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// kartu Pos PREM
            'cluster_kategoris_id' => 15,
            'is_material' => true,
            'material_ids' => ['47', '48'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// KOP surat STD
            'cluster_kategoris_id' => 16,
            'is_material' => true,
            'material_ids' => ['9', '10'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// KOP surat PREM
            'cluster_kategoris_id' => 17,
            'is_material' => true,
            'material_ids' => ['49'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([//Amplop Dl
            'cluster_kategoris_id' => 18,
            'is_material' => true,
            'material_ids' => ['10'],
            'is_size' => true,
            'size_ids' => ['62'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// kartu nama Esklusif
            'cluster_kategoris_id' => 19,
            'is_material' => true,
            'material_ids' => ['9'],
            'is_size' => true,
            'size_ids' => ['12'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        //Todo Lanyard masih Belum

        \App\Models\DetailProduct::create([// Map Folder Standar
            'cluster_kategoris_id' => 22,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_side' => true,
            'side_ids' => ['1'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Map Folder Prem
            'cluster_kategoris_id' => 23,
            'is_material' => true,
            'material_ids' => ['5', '8', '52', '50', ''],
            'is_size' => true,
            'size_ids' => ['9'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Hot Paper Cup
            'cluster_kategoris_id' => 24,
            'is_size' => true,
            'size_ids' => ['16', '17', '18', '19'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// cold Paper Cup
            'cluster_kategoris_id' => 25,
            'is_size' => true,
            'size_ids' => ['16', '17', '18', '19'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Ice Cream Cup
            'cluster_kategoris_id' => 26,
            'is_size' => true,
            'size_ids' => ['16', '17', '18', '19'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Bowl Paper Cup
            'cluster_kategoris_id' => 27,
            'is_size' => true,
            'size_ids' => ['16', '17', '18', '19'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Shopping bag STD
            'cluster_kategoris_id' => 28,
            'is_material' => true,
            'material_ids' => ['2'],
            'is_size' => true,
            'size_ids' => ['23', '24', '25'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'is_lamination' => true,
            'lamination_ids' => ['1', '2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Shopping bag PRem
            'cluster_kategoris_id' => 29,
            'is_material' => true,
            'material_ids' => ['52'],
            'is_size' => true,
            'size_ids' => ['23', '24', '25'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Lakban Trans
            'cluster_kategoris_id' => 31,
            'is_material' => true,
            'material_ids' => ['23'],
            'is_size' => true,
            'size_ids' => ['31', '32'],
            'is_color' => true,
            'color_ids' => ['3', '4'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Lakban Solid
            'cluster_kategoris_id' => 32,
            'is_material' => true,
            'material_ids' => ['23'],
            'is_size' => true,
            'size_ids' => ['31', '32'],
            'is_color' => true,
            'color_ids' => ['3', '4'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// PP
            'cluster_kategoris_id' => 33,
            'is_material' => true,
            'material_ids' => ['13', '14', '15'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// PET
            'cluster_kategoris_id' => 34,
            'is_material' => true,
            'material_ids' => ['54', '55'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Snack box Kecil
            'cluster_kategoris_id' => 35,
            'is_material' => true,
            'material_ids' => ['18', '19'],
            'is_size' => true,
            'size_ids' => ['26'],
            'is_color' => true,
            'color_ids' => ['6'],
            'is_lamination' => true,
            'lamination_ids' => ['2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Snack box Besar
            'cluster_kategoris_id' => 36,
            'is_material' => true,
            'material_ids' => ['18', '19'],
            'is_size' => true,
            'size_ids' => ['63', '64', '65'],
            'is_color' => true,
            'color_ids' => ['6'],
            'is_lamination' => true,
            'lamination_ids' => ['2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Snack box Persgi
            'cluster_kategoris_id' => 37,
            'is_material' => true,
            'material_ids' => ['18', '19'],
            'is_size' => true,
            'size_ids' => ['66', '67', '68'],
            'is_color' => true,
            'color_ids' => ['6'],
            'is_lamination' => true,
            'lamination_ids' => ['2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Label Harga STD
            'cluster_kategoris_id' => 38,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['34', '35'],
            'is_color' => true,
            'color_ids' => ['2'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Label Harga Prem
            'cluster_kategoris_id' => 39,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['34', '35'],
            'is_color' => true,
            'color_ids' => ['2'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_lamination' => true,
            'lamination_ids' => ['2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Lunch Box STD
            'cluster_kategoris_id' => 40,
            'is_material' => true,
            'material_ids' => ['16'],
            'is_size' => true,
            'size_ids' => ['69', '70'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Lunch Box bento
            'cluster_kategoris_id' => 41,
            'is_material' => true,
            'material_ids' => ['14'],
            'is_size' => true,
            'size_ids' => ['21', '22'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Lunch Box pail
            'cluster_kategoris_id' => 42,
            'is_material' => true,
            'material_ids' => ['16'],
            'is_size' => true,
            'size_ids' => ['20'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kardus box Kecil
            'cluster_kategoris_id' => 43,
            'is_material' => true,
            'material_ids' => ['20', '21'],
            'is_size' => true,
            'size_ids' => ['27'],
            'is_side' => true,
            'side_ids' => ['1'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kardus box STD
            'cluster_kategoris_id' => 44,
            'is_material' => true,
            'material_ids' => ['20', '21', '56', '57'],
            'is_size' => true,
            'size_ids' => ['28', '29', '30'],
            'is_side' => true,
            'side_ids' => ['1'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kardus box Pengiriman
            'cluster_kategoris_id' => 45,
            'is_material' => true,
            'material_ids' => ['20', '21'],
            'is_size' => true,
            'size_ids' => ['71', '72', '73'],
            'is_side' => true,
            'side_ids' => ['1'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Satchel STD
            'cluster_kategoris_id' => 46,
            'is_material' => true,
            'material_ids' => ['58'],
            'is_size' => true,
            'size_ids' => ['74', '75'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Satchel Prem
            'cluster_kategoris_id' => 47,
            'is_material' => true,
            'material_ids' => ['59'],
            'is_size' => true,
            'size_ids' => ['76', '77'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Food Paper STD
            'cluster_kategoris_id' => 48,
            'is_material' => true,
            'material_ids' => ['24'],
            'is_size' => true,
            'size_ids' => ['36', '37', '38'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Food Paper Prem
            'cluster_kategoris_id' => 49,
            'is_material' => true,
            'material_ids' => ['60'],
            'is_size' => true,
            'size_ids' => ['36', '78', '79'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Box Duplex Kecil
            'cluster_kategoris_id' => 50,
            'is_material' => true,
            'material_ids' => ['61'],
            'is_size' => true,
            'size_ids' => ['80'],
            'is_color' => true,
            'color_ids' => ['6'],
            'is_lamination' => true,
            'lamination_ids' => ['2', '3'],
            'is_finishing' => true,
            'finishing_ids' => ['20'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// FBox Duplex Besar
            'cluster_kategoris_id' => 51,
            'is_material' => true,
            'material_ids' => ['22'],
            'is_size' => true,
            'size_ids' => ['28', '29', '30'],
            'is_color' => true,
            'color_ids' => ['6'],
            'is_lamination' => true,
            'lamination_ids' => ['6', '7'],
            'is_finishing' => true,
            'finishing_ids' => ['21'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// Flyer STD
            'cluster_kategoris_id' => 52,
            'is_material' => true,
            'material_ids' => ['26', '27'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
            'is_design' => true
        ]);

        \App\Models\DetailProduct::create([// Flyer PREM
            'cluster_kategoris_id' => 53,
            'is_material' => true,
            'material_ids' => ['6', '47', '48'],
            'is_size' => true,
            'size_ids' => ['10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
            'is_design' => true
        ]);

//        \App\Models\DetailProduct::create([// Flyer Eco
//            'cluster_kategoris_id' => 53,
//            'is_material' => true,
//            'material_ids' => ['6', '47', '48'],
//            'is_size' => true,
//            'size_ids' => ['10', '11'],
//            'is_side' => true,
//            'side_ids' => ['1', '2'],
//            'unit_id' => 1,
//            'is_design' => true
//        ]);
        \App\Models\DetailProduct::create([// Poster STD
            'cluster_kategoris_id' => 55,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['8', '83'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
            'is_design' => true
        ]);

        \App\Models\DetailProduct::create([// Poster Back
            'cluster_kategoris_id' => 56,
            'is_material' => true,
            'material_ids' => ['32'],
            'is_size' => true,
            'size_ids' => ['81', '82'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Tent Card
            'cluster_kategoris_id' => 57,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['56', '57'],
            'is_lamination' => true,
            'lamination_ids' => ['2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Tent Card Sisipan
            'cluster_kategoris_id' => 58,
            'is_material' => true,
            'material_ids' => ['2', '9', '27'],
            'is_size' => true,
            'size_ids' => ['9', '10', '11'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Brosur STD
            'cluster_kategoris_id' => 59,
            'is_material' => true,
            'material_ids' => ['2', '3', '26', '27'],
            'is_size' => true,
            'size_ids' => ['9'],
            'is_folding' => true,
            'folding_ids' => ['1', '2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Brosur Prem
            'cluster_kategoris_id' => 60,
            'is_material' => true,
            'material_ids' => ['5', '50'],
            'is_size' => true,
            'size_ids' => ['9'],
            'is_folding' => true,
            'folding_ids' => ['1', '2', '3'],
            'unit_id' => 1,
        ]);
//
//        \App\Models\DetailProduct::create([// Brosur Eco
//            'cluster_kategoris_id' => 61,
//            'is_material' => true,
//            'material_ids' => ['5', '50'],
//            'is_size' => true,
//            'size_ids' => ['9'],
//            'is_folding' => true,
//            'folding_ids' => ['1', '2', '3'],
//            'unit_id' => 1,
//        ]);

        \App\Models\DetailProduct::create([// X Banner
            'cluster_kategoris_id' => 62,
            'is_material' => true,
            'material_ids' => ['32', '33', '34'],
            'is_size' => true,
            'size_ids' => ['44', '45'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Y Banner
            'cluster_kategoris_id' => 63,
            'is_material' => true,
            'material_ids' => ['32', '33', '34'],
            'is_size' => true,
            'size_ids' => ['44', '45'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Roll up Banner
            'cluster_kategoris_id' => 64,
            'is_material' => true,
            'material_ids' => ['32', '33', '34'],
            'is_size' => true,
            'size_ids' => ['44', '84'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// BIg Roll up Banner
            'cluster_kategoris_id' => 65,
            'is_material' => true,
            'material_ids' => ['32'],
            'is_size' => true,
            'size_ids' => ['44', '46'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Tripod STD
            'cluster_kategoris_id' => 66,
            'is_material' => true,
            'material_ids' => ['62'],
            'is_size' => true,
            'size_ids' => ['85'],
            'is_lamination' => true,
            'lamination_ids' => ['2', '3'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Tripod Prem
            'cluster_kategoris_id' => 67,
            'is_material' => true,
            'material_ids' => ['63'],
            'is_size' => true,
            'size_ids' => ['85'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Spanduk in STD
            'cluster_kategoris_id' => 68,
            'is_material' => true,
            'material_ids' => ['35', '64', '65', '66', '67'],
            'is_size' => true,
            'size_ids' => ['86', '87', '88', '89', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['22', '23', '24'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Spanduk In Prem
            'cluster_kategoris_id' => 69,
            'is_material' => true,
            'material_ids' => ['35', '36', '37', '38'],
            'is_size' => true,
            'size_ids' => ['86', '87', '88', '89', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['22', '23', '24'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Spanduk Out STD
            'cluster_kategoris_id' => 70,
            'is_material' => true,
            'material_ids' => ['64', '65', '66', '67'],
            'is_size' => true,
            'size_ids' => ['86', '87', '88', '89', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['22', '23', '24'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Spanduk OUt Prem
            'cluster_kategoris_id' => 71,
            'is_material' => true,
            'material_ids' => ['36', '37', '38'],
            'is_size' => true,
            'size_ids' => ['86', '87', '88', '89', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['22', '23', '24'],
            'unit_id' => 1,
        ]);

//        \App\Models\DetailProduct::create([// Booklet STD
//            'cluster_kategoris_id' => 72,
//            'is_material' => true,
//            'material_ids' => ['2', '3', '26','27'],
//            'is_size' => true,
//            'size_ids' => ['9', '10', ],
//            'is_finishing' => true,
//            'finishing_ids' => ['22', '23', '24'],
//            'unit_id' => 1,
//        ]);
//
//        \App\Models\DetailProduct::create([// Booklet Prem
//            'cluster_kategoris_id' => 73,
//            'is_material' => true,
//            'material_ids' => ['2', '3', '26','27'],
//            'is_size' => true,
//            'size_ids' => ['9', '10', ],
//            'is_finishing' => true,
//            'finishing_ids' => ['22', '23', '24'],
//            'unit_id' => 1,
//        ]);

        \App\Models\DetailProduct::create([// Stiker Bulat
            'cluster_kategoris_id' => 74,
            'is_material' => true,
            'material_ids' => ['28', '29', '30', '31'],
            'is_size' => true,
            'size_ids' => ['41', '42', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['20', '25'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Stiker Toples
            'cluster_kategoris_id' => 75,
            'is_material' => true,
            'material_ids' => ['28', '29', '30', '31'],
            'is_size' => true,
            'size_ids' => ['41', '42', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['20', '25'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Stiker Decal
            'cluster_kategoris_id' => 76,
            'is_material' => true,
            'material_ids' => ['28', '29', '30', '31'],
            'is_size' => true,
            'size_ids' => ['91', '92', '93', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['20', '25'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Label botol
            'cluster_kategoris_id' => 77,
            'is_material' => true,
            'material_ids' => ['30', '31'],
            'is_size' => true,
            'size_ids' => ['91', '93', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['20', '25'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Label lunch
            'cluster_kategoris_id' => 78,
            'is_material' => true,
            'material_ids' => ['30', '31'],
            'is_size' => true,
            'size_ids' => ['91', '93', '90'],
            'is_finishing' => true,
            'finishing_ids' => ['20', '25'],
            'is_side' => true,
            'side_ids' => ['1'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Sertif STD
            'cluster_kategoris_id' => 79,
            'is_material' => true,
            'material_ids' => ['2', '3', '4'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);


        \App\Models\DetailProduct::create([// Sertif Prem
            'cluster_kategoris_id' => 80,
            'is_material' => true,
            'material_ids' => ['5', '47', '48', '49', '50'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Majalah StD
            'cluster_kategoris_id' => 81,
            'is_material' => true,
            'material_ids' => ['5', '47', '48', '49', '50'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_material_cover' => true,
            'material_cover_ids' => ['2', '3'],
            'is_side_cover' => true,
            'side_cover_ids' => ['1', '2'],
            'is_cover_lamination' => true,
            'cover_lamination_ids' => ['1', '2'],
            'is_finishing' => true,
            'finishing_ids' => ['6'],
            'is_page' => true,
            'page_ids' => ['27', '28', '29', '30', '31', '32', '33', '34', '35'],
            'unit_id' => 1,
        ]);
//
        \App\Models\DetailProduct::create([// Majalah Prem
            'cluster_kategoris_id' => 82,
            'is_material' => true,
            'material_ids' => ['5', '47', '48', '49', '50'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_material_cover' => true,
            'material_cover_ids' => ['2', '3'],
            'is_side_cover' => true,
            'side_cover_ids' => ['1', '2'],
            'is_cover_lamination' => true,
            'cover_lamination_ids' => ['1', '2'],
            'is_finishing' => true,
            'finishing_ids' => ['6'],
            'is_page' => true,
            'page_ids' => ['27', '28', '29', '30', '31', '32', '33', '34', '35'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Compro STD
            'cluster_kategoris_id' => 83,
            'is_material' => true,
            'material_ids' => ['5', '2', '3'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_material_cover' => true,
            'material_cover_ids' => ['2', '3'],
            'is_cover_lamination' => true,
            'cover_lamination_ids' => ['1', '2'],
            'is_finishing' => true,
            'finishing_ids' => ['11'],
            'is_page' => true,
            'page_ids' => ['23', '25', '1', '3', '5',],
            'unit_id' => 1,
        ]);
//
        \App\Models\DetailProduct::create([// Compro Prem
            'cluster_kategoris_id' => 84,
            'is_material' => true,
            'material_ids' => ['50', '6'],
            'is_size' => true,
            'size_ids' => ['9', '12'],
            'is_material_cover' => true,
            'material_cover_ids' => ['50', '6'],
            'is_cover_lamination' => true,
            'cover_lamination_ids' => ['1', '2'],
            'is_finishing' => true,
            'finishing_ids' => ['11'],
            'is_page' => true,
            'page_ids' => ['23', '25', '1', '3', '5',],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kalender meja
            'cluster_kategoris_id' => 85,
            'is_material' => true,
            'material_ids' => ['2', '3',],
            'is_size' => true,
            'size_ids' => ['10'],
            'is_side' => true,
            'side_ids' => ['2'],
            'is_orientation' => true,
            'orientation_ids' => ['31', '32'],
            'is_page' => true,
            'page_ids' => ['24', '4',],
            'is_finishing' => true,
            'finishing_ids' => ['16'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kalender Poseter
            'cluster_kategoris_id' => 86,
            'is_material' => true,
            'material_ids' => ['2', '3',],
            'is_size' => true,
            'size_ids' => ['43'],
            'is_side' => true,
            'side_ids' => ['1'],
            'is_finishing' => true,
            'finishing_ids' => ['22'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Kalender Dinding
            'cluster_kategoris_id' => 87,
            'is_material' => true,
            'material_ids' => ['26', '27', '9'],
            'is_size' => true,
            'size_ids' => ['43'],
            'is_page' => true,
            'page_ids' => ['36', '37',],
            'is_finishing' => true,
            'is_orientation' => true,
            'orientation_ids' => ['32'],
            'finishing_ids' => ['16'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Voucher Buku
            'cluster_kategoris_id' => 88,
            'is_material' => true,
            'material_ids' => ['2', '3'],
            'is_size' => true,
            'size_ids' => ['47'],
            'is_finishing' => true,
            'finishing_ids' => ['26', '27', '28'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Voucher Satuan
            'cluster_kategoris_id' => 89,
            'is_material' => true,
            'material_ids' => ['4', '27'],
            'is_size' => true,
            'size_ids' => ['47'],
            'is_finishing' => true,
            'finishing_ids' => ['26', '27', '28'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Totebag
            'cluster_kategoris_id' => 90,
            'is_material' => true,
            'material_ids' => ['40'],
            'is_size' => true,
            'size_ids' => ['51', '52'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Totebag Prem
            'cluster_kategoris_id' => 91,
            'is_material' => true,
            'material_ids' => ['35'],
            'is_size' => true,
            'size_ids' => ['51', '52'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['2', '3', '4'],
            'unit_id' => 1,
        ]);
//
        \App\Models\DetailProduct::create([// Gooddie Std
            'cluster_kategoris_id' => 92,
            'is_material' => true,
            'material_ids' => ['41'],
            'is_size' => true,
            'size_ids' => ['53', '54', '55'],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['3', '4'],
            'is_finishing' => true,
            'finishing_ids' => ['29', '30'],
            'unit_id' => 1,
        ]);
//
        \App\Models\DetailProduct::create([// Goodie Prem
            'cluster_kategoris_id' => 93,
            'is_material' => true,
            'material_ids' => ['41'],
            'is_size' => true,
            'size_ids' => ['53', '54',],
            'is_side' => true,
            'side_ids' => ['1', '2'],
            'is_color' => true,
            'color_ids' => ['2'],
            'is_finishing' => true,
            'finishing_ids' => ['29', '30'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Polo Bordir
            'cluster_kategoris_id' => 94,
            'is_material' => true,
            'material_ids' => ['42'],
            'is_color' => true,
            'color_ids' => ['8', '9', '10'],
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
            'is_print_method' => true,
            'print_method_ids' => ['4'],
            'unit_id' => 1,
        ]);

        \App\Models\DetailProduct::create([// Goodie Prem
            'cluster_kategoris_id' => 95,
            'is_material' => true,
            'material_ids' => ['42'],
            'is_color' => true,
            'color_ids' => ['8', '9', '10'],
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
            'is_print_method' => true,
            'print_method_ids' => ['5'],
            'unit_id' => 1,
        ]);
    }
}
