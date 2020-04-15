<?php

use Illuminate\Database\Seeder;

class FrontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['10 x 10 cm', ' 10 x 10 cm'],
            'description' => [
                'Area cetak sebesar 10 x 10 cm.',
                'Print area of 10 x 10 cm.'
            ],
        ],
        [
            'name' => ['A4 (21 x 29,7 cm)', 'A4 (21 x 29,7 cm)'],
            'description' => [
                'Area cetak berukuran A4 (21 x 29,7 cm).',
                'A4-size print area of 21 x 29,7 cm.'
            ],
        ],
        [
            'name' => ['A3 (29,7 x 42 cm)', 'A3 (29,7 x 42 cm)'],
            'description' => [
                'Area cetak berukuran A3 (29,7 x 42 cm).',
                'A3-size print area of 29,7 x 42 cm.'
            ],
        ],
        [
            'name' => ['Kosong', 'Blank'],
            'description' => [
                'Tidak ada area cetak pada bagian depan.',
                'No print area at the front side.'
            ],
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Front::create([
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
