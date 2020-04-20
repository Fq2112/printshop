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
            'description' => null
        ],
        [
            'name' => ['Cetak & Potong (min. 40 pcs)', 'Print & Cut (min. 40 pcs)'],
            'description' => null
        ],
        [
            'name' => ['Sablon (min. 120 pcs)', 'Screen-printing (min. 120 pcs)'],
            'description' => null
        ],
        [
            'name' => ['Bordir (Min Qty 6 pcs)', 'Bordir (Min Qty 6 pcs)'],
            'description' => null
        ],
        [
            'name' => ['Polyflex (min. qty 6 pcs)', 'Polyflex (min. qty 6 pcs)'],
            'description' => null
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
                'image' => !is_null($DATUM['description']) ? $faker->imageUrl() : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ]
            ]);
        }
    }
}
