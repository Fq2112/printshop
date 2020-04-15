<?php

use Illuminate\Database\Seeder;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    const DATA = [
        [
            'name' => ['BRIZZI', 'BRIZZI'],
            'description' => [
                '',
                ''
            ]
        ],
        [
            'name' => ['E-Money', 'E-Money'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Flazz', 'Flazz'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Circle', 'Circle'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Rectangle', 'Rectangle'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Curve', 'Curve'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Straight/Flat', 'Straight/Flat'],
            'description' => [
                '',
                ''
            ],
        ]
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\TypeProduct::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ]
            ]);
        }
    }
}
