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
            'name' => ['Pages', 'Pages'],
            'description' => [
                '',
                ''
            ]
        ],
    ];

    public function run()
    {
        foreach (self::DATA as $DATUM) {
           for ($i = 20 ; $i<=50 ; $i++){
              if ($i % 2 == 0){
                  $faker = \Faker\Factory::create('id_ID');
                  \App\Models\Pages::create([
                      'name' => [
                          'en' => $i." ". $DATUM['name'][1],
                          'id' => $i." ". $DATUM['name'][0]
                      ],
                      'description' => [
                          'en' => $DATUM['description'][1],
                          'id' => $DATUM['description'][0]
                      ]
                  ]);
              }
           }
        }
    }
}
