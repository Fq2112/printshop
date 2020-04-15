<?php

use Illuminate\Database\Seeder;

class CopiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Ply', 'Ply'],
            'description' => null
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            for ($i = 1 ; $i<=3 ; $i++){
                $faker = \Faker\Factory::create('id_ID');
                \App\Models\Copies  ::create([
                    'name' => [
                        'en' => $i . " " . $DATUM['name'][1],
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
}
