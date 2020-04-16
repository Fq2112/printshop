<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    const Units = [
        ['pcs', 'pcs'],
        ['unit', 'unit(s)'],
        ['lembar', 'sheet(s)'],
        ['halaman', 'page(s)'],
        ['buku', 'book(s)'],
        ['box', 'box(es)'],
    ];

    public function run()
    {
        foreach (static::Units as $unit ) {
            \App\Models\Unit::create([
                'name' => [
                    'id' => $unit[0],
                    'en' => $unit[1],
                ]
            ]);
        }
    }
}
