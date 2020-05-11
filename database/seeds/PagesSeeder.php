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
        foreach (self::DATA as $DATUM) {
            for ($i = 20; $i <= 50; $i++) {
                if ($i % 2 == 0) {
                    $s = $i > 1 ? 's' : '';
                    \App\Models\Pages::create([
                        'name' => [
                            'en' => $i . " " . $DATUM['name'][1] . $s,
                            'id' => $i . " " . $DATUM['name'][0]
                        ],
                        'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
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
                'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                'description' => [
                    'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                    'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                ]
            ]);
        }

        foreach (self::DATA as $DATUM) {
            for ($i = 2; $i <= 18; $i++) {
                if ($i % 2 == 0) {
                    $s = $i > 1 ? 's' : '';
                    \App\Models\Pages::create([
                        'name' => [
                            'en' => $i . " " . $DATUM['name'][1] . $s,
                            'id' => $i . " " . $DATUM['name'][0]
                        ],
                        'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                        'description' => [
                            'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                            'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                        ]
                    ]);
                }
            }
        }

        foreach (self::DATA as $DATUM) {
            for ($i = 64; $i <= 80; $i++) {
                if ($i % 2 == 0) {
                    $s = $i > 1 ? 's' : '';
                    \App\Models\Pages::create([
                        'name' => [
                            'en' => $i . " " . $DATUM['name'][1] . $s,
                            'id' => $i . " " . $DATUM['name'][0]
                        ],
                        'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
                        'description' => [
                            'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                            'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
                        ]
                    ]);
                }
            }
        }

        \App\Models\Pages::create([
            'name' => [
                'en' => 7 . " " . $DATUM['name'][1] . "s",
                'id' => 7 . " " . $DATUM['name'][0]
            ],
            'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
            'description' => [
                'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
            ]
        ]);

        \App\Models\Pages::create([
            'name' => [
                'en' => 13 . " " . $DATUM['name'][1] . "s",
                'id' => 13 . " " . $DATUM['name'][0]
            ],
            'image' => !is_null($DATUM['description']) ? 'placeholder.png' : null,
            'description' => [
                'en' => !is_null($DATUM['description']) ? $DATUM['description'][1] : null,
                'id' => !is_null($DATUM['description']) ? $DATUM['description'][0] : null
            ]
        ]);
    }
}
