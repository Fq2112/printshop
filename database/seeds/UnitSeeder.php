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
        'Pcs',
        'Unit',
        'Sheet',
        'Box',
    ];

    public function run()
    {
        foreach (static::Units as $unit ) {
            \App\Models\Unit::create([
                'name' => $unit
            ]);
        }
    }
}
