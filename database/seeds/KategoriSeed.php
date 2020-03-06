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
            Kategori::create([
               'name' => $item
            ]);
        }
    }
}
