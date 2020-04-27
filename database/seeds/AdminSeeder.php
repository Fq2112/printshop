<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'Fiqy Ainuzzaqy',
            'username' => 'fq_whysoserious',
            'email' => 'fiqy_a@icloud.com',
            'password' => bcrypt('Fiqy2112'),
            'role' => \App\Support\Role::ROOT,
            'facebook' => 'FqNkk',
            'twitter' => 'Fq2112',
            'instagram' => 'fq_whysoserious',
            'whatsapp' => '+6281356598237',
        ]);

        \App\Models\Admin::create([
            'name' => 'Sindhu',
            'username' => 'sindhu.scott.royce',
            'email' => 'sindhu@supremewrap.co.id',
            'password' => bcrypt('Sindhu2112'),
            'role' => \App\Support\Role::OWNER,
            'instagram' => 'sindhu.scott.royce',
            'whatsapp' => '+6281615007777',
        ]);

        \App\Models\Admin::create([
            'name' => 'Marsella Tanaya',
            'username' => 'mar_tanaya',
            'email' => 'marsella@supremewrap.co.id',
            'password' => bcrypt('Marsella2112'),
            'role' => \App\Support\Role::ADMIN,
            'instagram' => 'mar_tanaya',
            'whatsapp' => '+628113051492',
        ]);

        $user = \App\User::create([
            'name' => 'Fiqy Ainuzzaqy',
            'username' => 'jQuinn',
            'email' => 'fiqy_a@icloud.com',
            'password' => bcrypt('secret'),
            'status' => true,
        ]);

        \App\Models\Bio::create(['user_id' => $user->id]);

        for ($i = 0; $i < 3; $i++) {
            $faker = Factory::create('id_ID');
            $dataUser = \App\User::create([
                'name' => $faker->name,
                'username' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'status' => true,
            ]);
            \App\Models\Bio::create([
                'user_id' => $dataUser->id,
            ]);
            for ($a = 0; $a < 2; $a++) {
               \App\Models\Address::create([
                   'user_id' => $dataUser->id,
                   'phone' => '+62 '.$faker->phoneNumber,
                   'address' => $faker->address,
                   'postal_code' => $faker->postcode,
                   'name' => $faker->sentence,
                   'is_main' => false,
                   'city_id' => rand(\App\Models\Cities::min('id'),\App\Models\Cities::max('id')),
                   'occupancy_id' => rand(\App\Models\OccupancyType::min('id'),\App\Models\OccupancyType::max('id'))
               ]);
            }
        }
    }
}
