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
            'name' => ['Laminasi Berbasis Air', 'Water Based Lamination'],
            'description' =>
                [
                    'Permukaan tidak mudah tergores dan ramah lingkungan.',
                    'The surface is not easily scratched and eco-friendly.'
                ],
        ],
        [
            'name' => ['Pernis UV', 'UV Varnish'],
            'description' =>
                [
                    'Permukaan licin, warna cetak lebih terang dan tahan terhadap air, goresan, dan juga matahari.',
                    'Slippery surface, brighter print colors and more resistant to water, scratches, and also the sun.'
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
                'image' => 'placeholder.png',
                'description' => [
                    'id' => $item['description'][0],
                    'en' => $item['description'][1],
                ],
                'price' => round(rand(5000, 15000))
            ]);
        }
    }
}
