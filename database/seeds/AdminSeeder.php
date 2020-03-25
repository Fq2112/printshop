<?php

use Illuminate\Database\Seeder;

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
    }
}
