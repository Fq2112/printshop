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
            'Potongan Sudut 90 Derajat', 'Standard Cutting With 90 Degree Corner'
        ]],
        ['name' => [
            '2 Sisi', ' Rounded Corner'
        ], 'description' => [
            'Potongan Sudut Melengkung', 'Advance Cutting With Rounded Corner'
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
