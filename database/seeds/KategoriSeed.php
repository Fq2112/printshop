<?php

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Spatie\Translatable\HasTranslations;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const NAME = [
        ['Kartu Nama', 'Business Cards'],
        ['Peralatan Kantor', 'Office Stationeries'],
        ['Kemasan' , 'Packaging'],
        ['Kebutuhan Marketing', 'Marketing Needs'],
        ['Kartu', 'Cards'],
        ['Garmen', 'Garments'],
        ['Foto & Hadiah', 'Photos & Gifts'],
    ];

    public function run()
    {
        foreach (self::NAME as $item ) {
            $faker = \Faker\Factory::create('id_ID');
            $kat = Kategori::create([
                'name' => [
                    'en' => $item[1],
                    'id' => $item[0]
                ],
                'image' => $faker->imageUrl(),

                'caption' =>[
                    'en' => $faker->paragraph,
                    'id' => $faker->paragraph
                ]
            ]);

        }
    }
}
