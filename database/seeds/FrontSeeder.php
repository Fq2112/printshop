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
            'name' => ['5 × 5 cm', ' 5 × 5 cm'],
            'description' => [
                'Desain akan dicetak dalam ukuran 5 × 5 cm',
                'Design will be printed on 5 × 5 cm'
            ]
        ],
        [
            'name' => ['10 × 10 cm', ' 10 × 10 cm'],
            'description' => [
                'Desain Akan Dicetak dalam ukuran 10 × 10 cm',
                'Design will be printed on 10 × 10 cm'
            ],
        ],
        [
            'name' => ['10 × 20 cm', ' 10 × 20 cm'],
            'description' => [
                'Desain Akan Dicetak dalam ukuran 10 × 20 cm',
                'Design will be printed on 10 × 20 cm'
            ],
        ],
        [
            'name' => ['Kosong', 'Blank'],
            'description' => [
                'Tanpa desain',
                'Without design'
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
