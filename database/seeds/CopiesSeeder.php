<?php

use Illuminate\Database\Seeder;

class CopiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['2 Ply', '2 Ply'],
            'description' => [
                'Terdiri dari dua rangkap kertas dengan warna putih dan pink.',
                'Consists of two copies of paper in white and pink.'
            ]
        ],
        [
            'name' => ['3 Ply', '3 Ply'],
            'description' => [
                'Terdiri dari tiga rangkap kertas dengan warna putih, pink, dan kuning.',
                'Consists of three copies of paper in white, pink, and yellow.'
            ]
        ],
        [
            'name' => ['4 Ply', '4 Ply'],
            'description' => [
                'Terdiri dari empat rangkap kertas dengan warna putih, pink, kuning, dan biru.',
                'Consists of four copies of paper in white, pink, yellow, and blue.'
            ]
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Copies::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => !is_null($DATUM['description']) ? $faker->imageUrl() : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ],
                'price' => round(rand(5000, 15000))
            ]);
        }
    }
}
