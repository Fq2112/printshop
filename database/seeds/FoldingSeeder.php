<?php

use Illuminate\Database\Seeder;

class FoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const DATA = [
        [
            'name' => ['Bifold', 'Bifold'],
            'description' => [
                'Satu lipatan di tengah kertas menghasilkan dua bagian yang sama.',
                'A fold in the middle of the paper produces two equal parts.'
            ],
        ],
        [
            'name' => ['Tri-Fold U', ' Tri-Fold U'],
            'description' => [
                'Dua lipatan di tengah kertas dengan model lipatan ke dalam menghasilkan tiga bagian yang sama.',
                'Two folds in the middle of the paper with inward-fold model produce three equal parts.'
            ],
        ],
        [
            'name' => ['Tri-Fold Z', ' Tri-Fold Z'],
            'description' => [
                'Dua lipatan di tengah kertas dengan model lipatan zigzag menghasilkan tiga bagian yang sama.',
                'Two folds in the middle of the paper with zigzag-fold model produce three equal parts.'
            ],
        ]
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
            \App\Models\Folding::create([
                'name' => [
                    'en' => $DATUM['name'][1],
                    'id' => $DATUM['name'][0]
                ],
                'image' => 'placeholder.png',
                'description' => [
                    'en' => $DATUM['description'][1],
                    'id' => $DATUM['description'][0]
                ],
                'price' => round(rand(1000, 1500))
            ]);
        }
    }
}
