<?php

use Illuminate\Database\Seeder;

class LaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        'Glossy',
        'Doff / Matte',
        '3D',
        'Emboss',
    ];

    public function run()
    {
        foreach (self::DATA as $item){
            \App\Models\Lamination::create([
               'name' => $item
            ]);
        }
    }
}
