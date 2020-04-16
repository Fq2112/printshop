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
                'Dokumen akan dicetak dengan warna hitam putih saja.',
                'Documents will be printed in black and white only.'
            ]
        ],
        [
            'name' => ['Full Color', 'Full Color'],
            'description' => [
                'Dokumen akan dicetak dengan penuh warna.',
                'Documents will be printed in full color.'
            ],
        ],
        [
            'name' => ['1 Warna', '1 Color'],
            'description' => [
                'Desain item dengan satu warna saja.',
                'Item design with one color only.'
            ],
        ],
        [
            'name' => ['2 Warna', '2 Colors'],
            'description' => [
                'Desain item dengan dua warna.',
                'Item design with two colors.'
            ],
        ],
        [
            'name' => ['Full Color Non-fullblock', 'Full Color Non-fullblock'],
            'description' => [
                'Desain item dengan penuh warna non-fullblock.',
                'Item design with full colors non-fullblock.'
            ],
        ],
        [
            'name' => ['4 Warna', '4 Colors'],
            'description' => [
                'Desain item dengan empat warna.',
                'Item design with four colors.'
            ],
        ],
        [
            'name' => ['Full Color', 'Full Color'],
            'description' => [
                'Desain item dengan penuh warna.',
                'Item design with full colors.'
            ],
        ],
        [
            'name' => ['#000000', '#000000'],
            'description' => null
        ],
        [
            'name' => ['#19198c', '#19198c'],
            'description' => null
        ],
        [
            'name' => ['#FFFFFF', '#FFFFFF'],
            'description' => null
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
                'image' => !is_null($DATUM['description']) ? $faker->imageUrl() : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ]
            ]);
        }
    }
}
