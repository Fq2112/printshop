<?php

use Illuminate\Database\Seeder;

class PriceTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    CONST DATA = [
        [
            'name' => "Type A",
            'discount' => '5',
            'tier' => [
                [
                    'start' => 1,
                    'end' => 5,
                ],
                [
                    'start' => 6,
                    'end' => 10,
                ],
                [
                    'start' => 11,
                    'end' => 15,
                ],
            ]
        ],
        [
            'name' => "Type B",
            'discount' => '10',
            'tier' => [
                [
                    'start' => 1,
                    'end' => 5,
                ],
                [
                    'start' => 6,
                    'end' => 10,
                ],
                [
                    'start' => 11,
                    'end' => 15,
                ],
                [
                    'start' => 16,
                    'end' => 20,
                ],

            ]
        ]
    ];


    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $type = \App\Models\TypeTier::query()->create([
                'name' => $DATUM['name'],
                'discount' => $DATUM['discount']
            ]);

            foreach ($DATUM['tier'] as $item){
                \App\Models\PriceTier::query()->create([
                    'start' => $item['start'],
                    'end' => $item['end'],
                    'type_id' => $type->id
                ]);
            }
        }
    }
}
