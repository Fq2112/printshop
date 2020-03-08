<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        foreach (\App\Models\ClusterKategori::all() as $data){
            \App\Models\Banner::create([
                'cluster_id' => $data->id,
                'title' => $data->name,
                'subtitle' => 'bla bla bla',
                'image' => $faker->imageUrl()
            ]);
        }
    }
}
