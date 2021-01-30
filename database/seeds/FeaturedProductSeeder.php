<?php

use Illuminate\Database\Seeder;

class FeaturedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubKategori::whereIn('id', [1, 31, 28, 8, 5, 38])->update(['is_featured' => true]);
        \App\Models\ClusterKategori::whereIn('id', [67, 66])->update(['is_featured' => true]);
    }
}
