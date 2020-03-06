<?php

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const NAME = [
        'Kartu Nama',
        'Peralatan Kantor',
        'Packaging',
        'Kebutuhan Marketing',
        'Kartu',
        'Garmen',
        'Foto & Hadiah',
    ];

    public function run()
    {
        foreach (self::NAME as $item)
        {
            $faker = \Faker\Factory::create('id_ID');
            Kategori::create([
               'name' => $item,
                'image' => $faker->imageUrl(),
                'caption' => $faker->paragraph
            ]);
        }
    }
}
