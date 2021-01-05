<?php

use Illuminate\Database\Seeder;

class TypeTierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        foreach (\App\Models\DetailSubkat::all() as $row) {
            $row->update([
                'price' => round(rand(2500, 5000)),
                'type_tier_id' => rand(1,2)
            ]);
        }

        foreach (\App\Models\DetailProduct::all() as $row) {
            $row->update([
                'price' => round(rand(2500, 5000)),
                'type_tier_id' => rand(1,2)
            ]);
        }
    }
}
