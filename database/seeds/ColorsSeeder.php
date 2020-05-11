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
            'name' => ['Hitam', 'Black'],
            'description' => ['#000000', '#000000'],
            'image' => null
        ],
        [
            'name' => ['Biru Laut', 'Navy'],
            'description' => ['#19198C', '#19198C'],
            'image' => null
        ],
        [
            'name' => ['Putih', 'White'],
            'description' => ['#FFFFFF', '#FFFFFF'],
            'image' => null
        ],
        [
            'name' => ['Separasi', 'Separation'],
            'description' => [
                'Desain item dengan warna separasi.',
                'Item design with separation colors.'
            ],
        ],
        [
            'name' => ['3 Warna', '3 Colors'],
            'description' => [
                'Desain item dengan tiga warna.',
                'Item design with three colors.'
            ],
        ],
        [
            'name' => ['Merah', 'Red'],
            'description' => ['#BC3C33', '#BC3C33'],
            'image' => null
        ],
        [
            'name' => ['Hijau', 'Green'],
            'description' => ['#4AA524', '#4AA524'],
            'image' => null
        ],
        [
            'name' => ['Kuning', 'Yellow'],
            'description' => ['#E8DD1C', '#E8DD1C'],
            'image' => null
        ],
        [
            'name' => ['Cyan', 'Cyan'],
            'description' => ['#0096FF', '#0096FF'],
            'image' => null
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            \App\Models\Colors::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => array_key_exists('image', $DATUM) ? $DATUM['image'] : 'placeholder.png',
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => round(rand(5000, 20000))
            ]);
        }
    }
}
