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
            'name' => ['Bordir (min. qty 3 pcs)', 'Embroidery (min. qty 3 pcs)'],
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
            \App\Models\PrintingMethods::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ],
                'price' => round(rand(20000, 40000))
            ]);
        }
    }
}
