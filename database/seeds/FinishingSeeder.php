<?php

use Illuminate\Database\Seeder;

class FinishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Hardcover Kancing', 'Buttons Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Spiral Dalam', 'Inner Spiral Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Spiral Luar', 'Outer Spiral Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Lem', 'Glue Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Jahit', 'Sewing Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Softcover < 2 cm', 'Softcover < 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Softcover < 4 cm', 'Softcover < 4 cm'],
            'description' => null
        ],
        [
            'name' => ['Softcover > 4 cm', 'Softcover > 4 cm'],
            'description' => null
        ],
        [
            'name' => ['Spiral < 2 cm', 'Spiral < 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Spiral > 2 cm', 'Spiral > 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Jepret', 'Snap'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Kalender', 'Calendar Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Laser Cut', 'Cut Laser'],
            'description' => null
        ],
        [
            'name' => ['Laser Ivory', 'Ivory Laser'],
            'description' => null
        ],
        [
            'name' => ['Klep Seng', 'Zinc Valve'],
            'description' => null
        ],
        [
            'name' => ['Spiral Kalender', 'Calendar Spiral'],
            'description' => null
        ],
        [
            'name' => ['Ring Kawat', 'Wire Ring'],
            'description' => [
                'Jilid dokumen dengan ring kawat (spiral).',
                'Binding documents with wire ring (spiral).'
            ]
        ],
        [
            'name' => ['Lakban', 'Duct Tape'],
            'description' => [
                'Jilid dokumen dengan staples dan lakban.',
                'Binding documents with staples and duct tape.'
            ]
        ],

        [
            'name' => ['Double Wall', 'Double Wall'],
            'description' => [
                'Ketebalan Extra dari bahan yang sebenarnya.',
                'Extra thickness from the actual material.'
            ]
        ],
        [
            'name' => ['Pond / Die Cut', 'Pond / Die Cut'],
            'description' => null
        ],
        [
            'name' => ['Lem', 'GLue'],
            'description' => null
        ],
        [
            'name' => ['Mata Ayam', 'Mata Ayam'],
            'description' =>  [
                'Finishing dengan mata ayam untuk memudahkan memasukan tali saat memasang spanduk.',
                'Finishing with chicken eye to make it easy to insert the rope when installing banners.'
            ]
        ],
        [
            'name' => ['Selongsong Atas/Bawah', 'Upper / Lower Sleeve'],
            'description' =>  [
                'Selongsong untuk instalasi materi promosi dengan penempatan dari atas-bawah',
                'The sleeves for the installation of promotional material by placement from the top-down'
            ]
        ],
        [
            'name' => ['Selongsong Kiri/Kanan', 'Selongsong Kiri/Kanan'],
            'description' =>  [
                'Selongsong untuk pemasangan materi promosi dengan penempatan dari kiri-kanan',
                'Sleeves for the installation of promotional material by placement from left-right'
            ]
        ],
        [
            'name' => ['Kiss Cut', 'Kiss Cut'],
            'description' => null
        ],
        [
            'name' => ['Numerator', 'Numerator'],
            'description' => null
        ],
        [
            'name' => ['Numerator & Perforasi', 'Numerator & Perforasi'],
            'description' => null
        ],
        [
            'name' => ['Perforasi', 'Perforasi'],
            'description' => null
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $item) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Finishing::create([
                'name' => [
                    'id' => $item['name'][0],
                    'en' => $item['name'][1],
                ],
                'image' => !is_null($item['description']) ? $faker->imageUrl() : null,
                'description' => [
                    'en' => !is_null($item['description']) ? $item['description'][1] : null,
                    'id' => !is_null($item['description']) ? $item['description'][0] : null
                ]
            ]);
        }
    }
}
