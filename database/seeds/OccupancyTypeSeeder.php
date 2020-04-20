<?php

use Illuminate\Database\Seeder;

class OccupancyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const NAME = [
        ["Apartemen", "Apartment"],
        ["Hotel", "Hotel"],
        ["Kantor", "Office"],
        ["Kondominium", "Condominium"],
        ["Kontrakan", "Rented House"],
        ["Kosan", "Boarding House"],
        ["Rumah", "Home"],
        ["Rumah Kantor", "Home Office"],
        ["Rumah Susun", "Flats"],
        ["Rumah Toko", "Shophouse"],
    ];

    public function run()
    {
        foreach (self::NAME as $item) {
            \App\Models\OccupancyType::create([
                'name' => [
                    'id' => $item[0],
                    'en' => $item[1],
                ],
                'image' => preg_replace("![^a-z0-9]+!i", "-", strtolower($item[1])) . '.png',
            ]);
        }
    }
}
