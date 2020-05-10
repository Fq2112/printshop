<?php

use Illuminate\Database\Seeder;

class RightLeftSideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const DATA = [
        [
            'name' => ['10 x 10 cm', ' 10 x 10 cm'],
            'description' => [
                'Area cetak sebesar 10 x 10 cm.',
                'Print area of 10 x 10 cm.'
            ],
        ],
        [
            'name' => ['Kosong', 'None'],
            'description' => [
                'Tidak ada area cetak pada bagian depan.',
                'No print area at the front side.'
            ],
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\RightLeftSide::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => $faker->imageUrl(),
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => round(rand(5000, 15000))
            ]);
        }
    }
}
