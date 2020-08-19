<?php

use Illuminate\Database\Seeder;

class GalClustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (\App\Models\ClusterKategori::all() as $item) {
            for ($i = 0; $i < 5; $i++) {
                \App\Models\GalleryCluster::create([
                    'cluster_id' => $item->id,
                    'image' => $item->thumbnail
                ]);
            }
        }
    }
}
