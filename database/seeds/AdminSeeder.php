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
        $faker = Factory::create('id_ID');

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

        \App\Models\Bio::create([
            'user_id' => $user->id,
            'phone' => '081356598237',
            'gender' => 'male',
            'dob' => '1997-10-15'
        ]);

        \App\Models\Address::create([
            'user_id' => $user->id,
            'phone' => '081356598237',
            'address' => 'Jl. Hikmat 50A Betro, Sedati, Sidoarjo',
            'lat' => '-7.3857584',
            'long' => '112.7574375',
            'postal_code' => '61253',
            'name' => 'Fiqy Ainuzzaqy',
            'is_main' => true,
            'city_id' => 409,
            'occupancy_id' => 8
        ]);
        \App\Models\Address::create([
            'user_id' => $user->id,
            'phone' => '082234389870',
            'address' => 'Desa Pakel, Tulungagung',
            'lat' => '-8.1501485',
            'long' => '111.7990778',
            'postal_code' => '66273',
            'name' => 'Laras Sulistyorini',
            'is_main' => false,
            'city_id' => 492,
            'occupancy_id' => 7
        ]);

        for ($i = 0; $i < 3; $i++) {
            $dataUser = \App\User::create([
                'name' => $faker->name,
                'username' => str_replace(' ', '', $faker->name),
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'status' => true,
            ]);
            \App\Models\Bio::create([
                'user_id' => $dataUser->id,
                'phone' => '+628123456789' . rand(0, 9),
                'gender' => rand(0, 1) ? 'male' : 'female',
                'dob' => $faker->date('Y-m-d')
            ]);
            for ($a = 0; $a < 2; $a++) {
                \App\Models\Address::create([
                    'user_id' => $dataUser->id,
                    'phone' => '+628123456789' . rand(0, 9),
                    'address' => $faker->address,
                    'postal_code' => $faker->postcode,
                    'name' => $faker->sentence,
                    'is_main' => rand(0, 1) ? true : false,
                    'city_id' => rand(\App\Models\Cities::min('id'), \App\Models\Cities::max('id')),
                    'occupancy_id' => rand(\App\Models\OccupancyType::min('id'), \App\Models\OccupancyType::max('id'))
                ]);
            }
        }
    }
}
