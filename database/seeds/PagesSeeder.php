<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['halaman', 'page'],
            'description' => null
        ],
    ];

    const DATA2 = [
        [
            'name' => ['50 lembar', '50 sheets'],
            'description' => null
        ],
    ];

    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        foreach (self::DATA as $DATUM) {
            for ($i = 20; $i <= 50; $i++) {
                if ($i % 2 == 0) {
                    $s = $i > 1 ? 's' : '';
                    \App\Models\Pages::create([
                        'name' => [
                            'en' => $i . " " . $DATUM['name'][1] . $s,
                            'id' => $i . " " . $DATUM['name'][0]
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

        foreach (self::DATA2 as $DATUM) {
            \App\Models\Pages::create([
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
