<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\User::all() as $user) {
            $faker = Factory::create('id_ID');
            \App\Models\Kontak::create([
                'email' => $user->email,
                'name' => $user->name,
                'topic' => 'Help',
                'subject' => $faker->sentence,
                'message' => $faker->paragraph
            ]);
        }
    }
}
