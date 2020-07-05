<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\Setting::create([
            'email_premier' => "indoprintpremier@gmail.com",
           'address' => 'Raya Kenjeran 469 Gading, Tambaksari, Surabaya, Jawa Timur – 60134.',
           'phone' => '(031) 3814969',
           'fax' => '(031) 3814969',

       ]);
    }
}
