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
            'description' => null
        ],
        [
            'name' => ['E-Money', 'E-Money'],
            'description' => null
        ],
        [
            'name' => ['Flazz', 'Flazz'],
            'description' => null
        ],
        [
            'name' => ['Lingkaran', 'Circle'],
            'description' => null
        ],
        [
            'name' => ['Persegi Panjang', 'Rectangle'],
            'description' => null
        ],
        [
            'name' => ['Melengkung', 'Curve'],
            'description' => null
        ],
        [
            'name' => ['Lurus / Rata', 'Straight / Flat'],
            'description' => null
        ]
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            \App\Models\TypeProduct::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ]
            ]);
        }
    }
}
