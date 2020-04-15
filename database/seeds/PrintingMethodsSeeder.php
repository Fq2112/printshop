<?php

use Illuminate\Database\Seeder;

class PrintingMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const DATA = [
        [
            'name' => ['DTG (min. 1 pcs)', 'DTG (min. 1 pcs)'],
            'description' => [
                '',
                ''
            ]
        ],
        [
            'name' => ['Print & Cut (min. 40 pcs)', 'Print & Cut (min. 40 pcs)'],
            'description' => [
                '',
                ''
            ],
        ],
        [
            'name' => ['Screen-printing (min. 120 pcs)', 'Screen-printing (min. 120 pcs)'],
            'description' => [
                '',
                ''
            ],
        ],
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\PrintingMethods::create([
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
