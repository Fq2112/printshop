<?php

use Illuminate\Database\Seeder;

class SideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['1 sisi', '1 side'],
            'description' => [
                'Desain akan dicetak pada satu sisi',
                'Design will be printed on one side'
            ]
        ],
        [
            'name' => ['2 sisi', '2 sides'],
            'description' => [
                'Desain akan dicetak pada kedua sisi',
                'Design will be printed on both sides'
            ],
        ]
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Side::create([
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
