<?php

use Illuminate\Database\Seeder;

class GalerySubs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\SubKategori::all() as $item) {
            for ($i = 0; $i < 5; $i++) {
                GaleryCluster::create([
                    'subkategori_id' => $item->id,
                    'image' => 'http://lorempixel.com/640/480/'
                ]);
            }
        }
    }
}
