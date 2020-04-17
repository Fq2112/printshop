<?php

use Illuminate\Database\Seeder;

class LaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        [
            'name' => ['Non-laminasi', 'Non-laminated'],
            'description' =>
                [
                    'Permukaan kertas tidak dilaminasi.',
                    'Paper surface is not laminated.'
                ]
        ],
        [
            'name' => ['Glossy', 'Glossy'],
            'description' =>
                [
                    'Permukaan kertas mengkilap, lebih cerah, dan warna cetak lebih jelas.',
                    'Paper surface is glossy, brighter, and print colors are more visible.'
                ],
        ],
        [
            'name' => ['Doff / Matte', 'Doff / Matte'],
            'description' =>
                [
                    'Permukaan kertas halus, tidak mengkilap, dan tampak lebih eksklusif.',
                    'Paper surface is smooth, non-glossy, and looks more exclusive.'
                ],
        ],
        [
            'name' => ['3D', '3D'],
            'description' =>
                [
                    'Permukaan kertas bertekstur dan tampak lebih eksklusif.',
                    'Paper surface is textured and looks more exclusive.'
                ],
        ],
        [
            'name' => ['Emboss', 'Embossed'],
            'description' =>
                [
                    'Permukaan kertas emboss dan tampak lebih eksklusif.',
                    'Paper surface is embossed and looks more exclusive.'
                ],
        ],
        [
            'name' => ['Laminasi Water Based', 'Laminasi Water Based'],
            'description' =>
                [
                    'Permukaan tidak mudah tergores dan ramah lingkungan.',
                    'The surface is not easily scratched and environmentally friendly'
                ],
        ],
        [
            'name' => ['UV Vernish', 'UV Vernish'],
            'description' =>
                [
                    'Permukaan licin, hasil print warna lebih terang dan lebih tahan terhadap air, goresan & matahari',
                    'Slippery surface, brighter color prints and more resistant to water, scratches & sun'
                ],
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $item) {
            \App\Models\Lamination::create([
                'name' => [
                    'id' => $item['name'][0],
                    'en' => $item['name'][1],
                ],
                'image' => \Faker\Factory::create()->imageUrl(),
                'description' => [
                    'id' => $item['description'][0],
                    'en' => $item['description'][1],
                ]
            ]);
        }
    }
}
