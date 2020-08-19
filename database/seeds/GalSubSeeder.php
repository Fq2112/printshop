<?php

use Illuminate\Database\Seeder;

class GalSubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\SubKategori::doesnthave('getCluster')->get() as $item) {
            for ($i = 0; $i < 5; $i++) {
                \App\Models\GallerySubs::create([
                    'subkategori_id' => $item->id,
                    'image' => $item->banner
                ]);
            }
        }

    }
}
