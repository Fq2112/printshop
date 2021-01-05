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
                'Desain akan dicetak pada satu sisi.',
                'Design will be printed on one side.'
            ],
            'price' => 1
        ],
        [
            'name' => ['2 sisi', '2 sides'],
            'description' => [
                'Desain akan dicetak pada kedua sisi.',
                'Design will be printed on both sides.'
            ],
            'price' => 2
        ]
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            \App\Models\Side::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => 'placeholder.png',
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => $DATUM['price']
            ]);
        }
    }
}
