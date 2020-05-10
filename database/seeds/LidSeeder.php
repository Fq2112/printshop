<?php

use Illuminate\Database\Seeder;

class LidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Hitam', 'Black'],
            'description' => [
                'Lid warna hitam untuk hot paper cup.',
                'Black lid for hot paper cups.'
            ],
        ],
        [
            'name' => ['Tanpa Tutup', 'None'],
            'description' => [
                'Paper cup tanpa tutup.',
                'Paper cups without lid.'
            ],
        ],
        [
            'name' => ['Putih', 'White'],
            'description' => [
                'Lid warna putih untuk hot paper cup.',
                'White lid for hot paper cups.'
            ],
        ],
        [
            'name' => ['Natural', 'Natural'],
            'description' => [
                'Cold paper cup dengan tutup berwarna broken white.',
                'Cold paper cups with broken white colored lid.'
            ],
        ],
        [
            'name' => ['Putih', 'White'],
            'description' => [
                'Lid berwarna putih untuk menjaga suhu produk yang dikemas.',
                'White lid to maintain the temperature of the packaged product.'
            ],
        ],
        [
            'name' => ['Lid Kubah', 'Dome Lid'],
            'description' => [
                'Lid berbahan plastik berbentuk setengah lingkaran dan lubang dibagian atas untuk sedotan.',
                'Semicircular-shaped plastic lid with a hole in the top for straws.'
            ],
        ],
        [
            'name' => ['Lid Datar', 'Flat Lid'],
            'description' => [
                'Lid berbahan plastik berbentuk pipih dengan lubang di bagian tengah untuk sedotan.',
                'Flat-shaped plastic lid with a hole in the middle for a straw.'
            ],
        ],

    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Lid::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => $faker->imageUrl(),
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => round(rand(500, 1500))
            ]);
        }
    }
}
