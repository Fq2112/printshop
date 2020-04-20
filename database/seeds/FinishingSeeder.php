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
            'name' => ['Mata Ayam', 'Nearsighted'],
            'description' => [
                'Finishing dengan mata ayam memudahkan untuk memasukan tali saat pemasangan spanduk.',
                'Finishing with chicken eye (nearsighted) makes it easy to insert straps when mounting banners.'
            ]
        ],
        [
            'name' => ['Selongsong Atas / Bawah', 'Top / Bottom Sleeve'],
            'description' => [
                'Selongsong untuk instalasi materi promosi dengan penempatan atas-bawah.',
                'Sleeve for installation of promotional material with top-bottom placement.'
            ]
        ],
        [
            'name' => ['Selongsong Kiri / Kanan', 'Left / Right Sleeve'],
            'description' => [
                'Selongsong untuk instalasi materi promosi dengan penempatan kiri-kanan.',
                'Sleeve for installation of promotional material with left-right placement.'
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
            'name' => ['Numerator & Perforasi', 'Numerator & Perforation'],
            'description' => null
        ],
        [
            'name' => ['Perforasi', 'Perforation'],
            'description' => null
        ],
        [
            'name' => ['Oval', 'Oval'],
            'description' => [
                'Pegangan dengan bentuk lubang oval di bagian depan dan belakang sisi tas.',
                'The oval hole handles are on the front and back sides of the bag'
            ]
        ],
        [
            'name' => ['Chord', 'Chord'],
            'description' => [
                'Pegangan dengan bentuk tali pada umumnya yang ditempel di bagian depan dan belakang sisi tas',
                'Grips in the form of straps are generally attached to the front and back of the bag'
            ]
        ],
        [
            'name' => ['Landscape', 'Landscape'],
            'description' => null
        ],
        [
            'name' => ['Potrait', 'Potrait'],
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
