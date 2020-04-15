<?php

use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Hitam & Putih', 'Black & White'],
            'description' => [
                'Dokumen dengan warna cetak hitam putih.',
                'Documents Will printed with black and white only'
            ]
        ],
        [
            'name' => ['Full Color', 'Full Color'],
            'description' => [
                'Dokumen dengan warna cetak full color.',
                'Documents Will printed full color'
            ],
        ],
        [
            'name' => ['1 Warna', '1 Color'],
            'description' => [
                'Item dengan design cetak 1 warna',
                'Item With one color only'
            ],
        ],
        [
            'name' => ['2 Warna', '2 Colors'],
            'description' => [
                'Item dengan design cetak 2 warna',
                'Item With full color design'
            ],
        ],
        [
            'name' => ['Full Color Non Fullblock', 'Full Color Non Fullblock'],
            'description' => [
                'Item dengan design cetak penuh warna non fullblock',
                'Item with full colors design non fullback'
            ],
        ],
        [
            'name' => ['4 Warna', '4 Colors'],
            'description' => [
                'Item dengan maksimal 4 warna pada design',
                'Iitem with maximum 4 colors design'
            ],
        ],
        [
            'name' => ['Full Color', 'Full Color'],
            'description' => [
                'Item dengan design cetak penuh warna',
                'Item with full colors design'
            ],
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Colors::create([
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
