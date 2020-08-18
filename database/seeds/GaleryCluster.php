<?php

use Illuminate\Database\Seeder;

class GaleryCluster extends Seeder
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
                GaleryCluster::create([
                    'cluster_id' => $item->id,
                    'image' => 'http://lorempixel.com/640/480/'
                ]);
            }
        }
    }
}
