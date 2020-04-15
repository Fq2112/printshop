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
        [
            'name' => ['Hardcover Kancing', 'Buttons Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Spiral Dalam', 'Inner Spiral Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Spiral Luar', 'Outer Spiral Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Lem', 'Glue Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Jahit', 'Sewing Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Softcover < 2 cm', 'Softcover < 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Softcover < 4 cm', 'Softcover < 4 cm'],
            'description' => null
        ],
        [
            'name' => ['Softcover > 4 cm', 'Softcover > 4 cm'],
            'description' => null
        ],
        [
            'name' => ['Spiral < 2 cm', 'Spiral < 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Spiral > 2 cm', 'Spiral > 2 cm'],
            'description' => null
        ],
        [
            'name' => ['Jepret', 'Snap'],
            'description' => null
        ],
        [
            'name' => ['Hardcover Kalender', 'Calendar Hardcover'],
            'description' => null
        ],
        [
            'name' => ['Laser Cut', 'Cut Laser'],
            'description' => null
        ],
        [
            'name' => ['Laser Ivory', 'Ivory Laser'],
            'description' => null
        ],
        [
            'name' => ['Klep Seng', 'Zinc Valve'],
            'description' => null
        ],
        [
            'name' => ['Spiral Kalender', 'Calendar Spiral'],
            'description' => null
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $item) {
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Finishing::create([
                'name' => [
                    'id' => $item['name'][0],
                    'en' => $item['name'][1],
                ],
                'image' => !is_null($item['description']) ? $faker->imageUrl() : null,
                'description' => [
                    'en' => !is_null($item['description']) ? $item['description'][1] : null,
                    'id' => !is_null($item['description']) ? $item['description'][0] : null
                ]
            ]);
        }
    }
}
