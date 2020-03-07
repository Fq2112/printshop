<?php

use Illuminate\Database\Seeder;

class BackSideSeeder extends Seeder
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
            '10 X 10 Cm', ' 10 X 10 Cm'
        ], 'description' => [
            'Desain Akan Dicetak dalam ukuran 10 X 10 Cm', 'Design Will be Printed on 10 X 10 Cm'
        ],],
        ['name' => [
            '10 X 20 Cm', ' 10 X 20 Cm'
        ], 'description' => [
            'Desain Akan Dicetak dalam ukuran 10 X 20 Cm', 'Design Will be Printed on 10 X 20 Cm'
        ],],
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
            \App\Models\BackSide::create([
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
