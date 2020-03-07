<?php

use Illuminate\Database\Seeder;

class SdeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        ['name' => [
            '1 Sisi', ' 1 Side'
        ], 'description' => [
            'Desain Akan Dicetak 1 sisi', 'Design Will be Printed on 1 side'
        ]],
        ['name' => [
            '2 Sisi', ' 2 Sides'
        ], 'description' => [
            'Desain Akan Dicetak 2 sisi', 'Design Will be Printed on both sides'
        ],]
    ];
    public function run()
    {
        foreach (self::DATA as $DATUM) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Side::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => $faker->imageUrl(),
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ]
            ]);
        }
    }
}
