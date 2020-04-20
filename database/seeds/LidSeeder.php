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
                'Lid warna hitam untuk hot paper cup',
                'Black lid for hot paper cup.'
            ],
        ],
        [
            'name' => ['Tanpa Lid', ' None'],
            'description' => [
                'Paper cup tanpa tutup.',
                'Cup Without Lid.'
            ],
        ],
        [
            'name' => ['Putih', 'White'],
            'description' => [
                'Lid warna hitam untuk hot paper cup.',
                'White lid for hot paper cup.'
            ],
        ],
        [
            'name' => ['Natural', 'Natural'],
            'description' => [
                'Cold paper cup dengan tutup berwarna broken white.',
                'Cold paper cup with broken white colored lid.'
            ],
        ],
        [
            'name' => ['Putih', 'White'],
            'description' => [
                'Tutup berwarna putih untuk menjaga temperatur produk yang dikemas.',
                'White lid to maintain the temperature of the packaged product.'
            ],
        ],
        [
            'name' => ['Lid Kubah', 'Dome Lid'],
            'description' => [
                'Tutup gelas berbahan plastik dengan bentuk setengah lingkaran dan lubang dibagian atas untuk sedotan',
                'Cover the glass made of plastic with a semicircular shape and hole at the top for a straw.'
            ],
        ],
        [
            'name' => ['Lid Datar', 'Flat Lid'],
            'description' => [
                'Tutup gelas berbahan plastik dan berbentuk pipih dengan lubang di bagian tengah untuk sedotan',
                'Plastic and flat glass lid with a hole in the middle for a straw.'
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
                ]
            ]);
        }
    }
}
