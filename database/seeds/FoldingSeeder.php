<?php

use Illuminate\Database\Seeder;

class FoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const DATA = [
        ['name' => [
            'Lipat Dua', ' 1 Side'
        ], 'description' => [
            'Lipatan di tengah kertas menghasilkan porduk yang telipat menjadi dua pada bagaian tengah',
            'One Time Folding product the amount of 2 sections'
        ],],
        ['name' => [
            'Tri-Fold U', ' Tri-Fold U'
        ], 'description' => [
            'Lipatan di tengah kertas menghasilkan porduk yang telipat menjadi tiga dengan model lipatan kedalam',
            'Two times centered-folding producing the amount of 3 sections'
        ],],
        ['name' => [
            'Tri-Fold Z', ' Tri-Fold Z'
        ], 'description' => [
            'Lipatan di tengah kertas menghasilkan porduk yang telipat menjadi tiga dengan moodel lipatan Zig-Zag',
            'Two times zig-zag producing the amount of 3 sections'
        ],]
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Folding::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => $faker->imageUrl(),
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ]
            ]);
        }
    }
}
