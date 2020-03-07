<?php

use Illuminate\Database\Seeder;

class FinishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    const DATA = [
        'Hard Cover Kancing',
        'Hard Cover Spiral Dalam',
        'Hard Cover Spiral Luar',
        'Hard Cover Lem',
        'Hard Cover Jahit',
        'Soft Cover < 2 Cm',
        'Soft Cover < 4 Cm' ,
        'Soft Cover > 4 Cm',
        'Spiral < 2 Cm',
        'Spiral > 2 Cm',
        'Jepret',
        'Hard Cover Calender',
        'Laser Cut',
        'Laser Ivory',
        'Klep Seng',
        'Spiral Kalender',
    ];

    public function run()
    {
        foreach (self::DATA as $item){
            $faker = \Faker\Factory::create('id_ID');
            \App\Models\Finishing::create([
                'name' => $item
            ]);
        }
    }
}
