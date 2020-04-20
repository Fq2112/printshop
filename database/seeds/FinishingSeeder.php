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
            'name' => ['Lem', 'Glue'],
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
                'Pegangan berbentuk lubang oval di bagian depan dan belakang sisi tas.',
                'Oval-shaped handle on the front and back sides of the bag.'
            ]
        ],
        [
            'name' => ['Chord', 'Chord'],
            'description' => [
                'Pegangan berbentuk tali yang umumnya ditempel di bagian depan dan belakang sisi tas.',
                'Strap-shaped handle that is generally attached to the front and back of the bag.'
            ]
        ],
        [
            'name' => ['Landscape', 'Landscape'],
            'description' => null
        ],
        [
            'name' => ['Portrait', 'Portrait'],
            'description' => null
        ],
        [
            'name' => ['Lubang', 'Hole'],
            'description' => null
        ],
        [
            'name' => ['Oval', 'Oval'],
            'description' => null
        ],
        [
            'name' => ['Tidak Ada', 'None'],
            'description' => null
        ],
        [
            'name' => ['Tali Kur', 'Cord Rope'],
            'description' => [
                'Tali ekonomis dan relatif kuat yang dibuat dari benang rajut.',
                'Economic and relatively strong ropes made from knitting yarn.'
            ]
        ],
        [
            'name' => ['Tali Twist', 'Twisted Rope'],
            'description' => [
                'Sama seperti tali kur dengan bentuk pegangan yang berbeda.',
                'Just like the cord rope with a different handle shape.'
            ]
        ],
        [
            'name' => ['Tali', 'Rope'],
            'description' => [
                'Tali untuk menggantung label harga.',
                'Ropes for hanging price tags.'
            ]
        ],
        [
            'name' => ['Tidak Ada', 'None'],
            'description' => [
                'Tanpa finishing apapun.',
                'Without any finishing.'
            ]
        ],
        [
            'name' => ['Staples / Jahit Kawat', 'Staples / Wire Binding'],
            'description' => null
        ],
        [
            'name' => ['Spiral Hitam', 'Black Spiral'],
            'description' => [
                'Kawat spiral berwarna hitam sebagai finishing.',
                'Black colored spiral wire as finishing.',
            ]
        ],
        [
            'name' => ['Spiral Putih', 'White Spiral'],
            'description' => [
                'Kawat spiral berwarna putih sebagai finishing.',
                'White colored spiral wire as finishing.',
            ]
        ],
        [
            'name' => ['Plastik Mika', 'Mica Plastic'],
            'description' => [
                'Bahan holder yang lebih kaku.',
                'Stiffer holder material.'
            ],
        ],
        [
            'name' => ['Silikon', 'Silicon'],
            'description' => [
                'Bahan holder yang lebih lentur dan kuat.',
                'Flexible and stronger holder material.'
            ],
        ],
        [
            'name' => ['Tanpa Holder', 'None'],
            'description' => [
                'Tanpa holder.',
                'Without holder.'
            ],
        ],
        [
            'name' => ['Stopper', 'Stopper'],
            'description' => null,
        ],
        [
            'name' => ['Yoyo ID', 'Yoyo ID'],
            'description' => [
                'Yoyo ID yang bisa ditarik sehingga kartu identitas menjadi lebih fleksibel.',
                'Yoyo ID can be withdrawn so that the identity card becomes more flexible.',
            ]
        ],
        [
            'name' => ['Tanpa Yoyo', 'None'],
            'description' => [
                'Tanpa yoyo.',
                'Without yoyo.'
            ]
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
