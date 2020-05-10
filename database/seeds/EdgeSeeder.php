<?php

use Illuminate\Database\Seeder;

class EdgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Sudut Siku', 'Square Corner'],
            'description' => ['Potongan sudut siku 90°.', 'Standard cutting with 90° square corner.']
        ],
        [
            'name' => ['Sudut Lengkung', 'Rounded Corner'],
            'description' => ['Potongan sudut melengkung.', 'Advance cutting with rounded corner.']
        ]
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Edge::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => $faker->imageUrl(),
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => round(rand(1000, 10000))
            ]);
        }
    }
}
