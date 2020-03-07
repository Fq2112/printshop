<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             KategoriSeed::class,
             SubKategoriSeed::class,
             ClusterKategoriSeed::class,
             EdgeSeeder::class,
             SdeSeeder::class,
             FrontSeeder::class,
             RightLeftSideSeeder::class,
             BackSideSeeder::class,
             ProvinceSeeder::class,
             CitiesSeeder::class,
             FoldingSeeder::class,
             LaminationSeeder::class,
             FinishingSeeder::class
         ]);
    }
}
