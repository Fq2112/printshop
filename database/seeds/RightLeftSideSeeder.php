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
        ['name' => [
            '5 X 5 Cm', ' 5 X 5 Cm'
        ], 'description' => [
            'Desain akan dicetak dalam ukuran 5 X 5 Cm', 'Design Will be Printed on 5 X 5 Cm'
        ]],
        ['name' => [
            'Kosong', ' None'
        ], 'description' => [
            'Tanpa Desain', 'Without Design'
        ],],
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
                ]
            ]);
        }
    }
}
