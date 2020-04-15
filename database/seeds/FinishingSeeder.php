<?php

use Illuminate\Database\Seeder;

class FinishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        ['Hardcover Kancing', 'Buttons Hardcover'],
        ['Hardcover Spiral Dalam', 'Inner Spiral Hardcover'],
        ['Hardcover Spiral Luar', 'Outer Spiral Hardcover'],
        ['Hardcover Lem', 'Glue Hardcover'],
        ['Hardcover Jahit', 'Sewing Hardcover'],
        ['Softcover < 2 cm', 'Softcover < 2 cm'],
        ['Softcover < 4 cm', 'Softcover < 4 cm'],
        ['Softcover > 4 cm', 'Softcover > 4 cm'],
        ['Spiral < 2 cm', 'Spiral < 2 cm'],
        ['Spiral > 2 cm', 'Spiral > 2 cm'],
        ['Jepret', 'Snap'],
        ['Hardcover Kalender', 'Calendar Hardcover'],
        ['Laser Cut', 'Cut Laser'],
        ['Laser Ivory', 'Ivory Laser'],
        ['Klep Seng', 'Zinc Valve'],
        ['Spiral Kalender', 'Calendar Spiral'],
    ];

    public function run()
    {
        foreach (self::DATA as $item){
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Finishing::create([
                'name' => [
                    'id' => $item[0],
                    'en' => $item[1],
                ]
            ]);
        }
    }
}
