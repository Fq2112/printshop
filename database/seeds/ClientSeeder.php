<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Clients::create([
            'name' => 'ARTOTEL ( HOTEL )',
            'logo' => 'artotel.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'BUMI SURABAYA ( HOTEL )',
            'logo' => 'bumi-surabaya.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'JAVA PARAGON ( HOTEL )',
            'logo' => 'java-paragon.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'MAJAPAHIT ( HOTEL )',
            'logo' => 'majapahit.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'SHANGRI-LA ( HOTEL )',
            'logo' => 'shangri-la.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'INFOMEDIA TELKOM',
            'logo' => 'infomedia-telkom.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'MASPION GROUP',
            'logo' => 'maspion-group.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'MIKATASA AGUNG',
            'logo' => 'mikatasa-agung.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'BERNARDI',
            'logo' => 'bernardi.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'CHEERS',
            'logo' => 'cheers.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'THEYS',
            'logo' => 'theys.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'BRI',
            'logo' => 'bri.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'SAMPOERNA',
            'logo' => 'sampoerna.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'TELKOM INDONESIA',
            'logo' => 'telkom-indonesia.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'X.O GROUP',
            'logo' => 'xo-group.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'GRAND CITY',
            'logo' => 'grand-city.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'JADE IMPERIAL',
            'logo' => 'jade-imperial.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'HONDA',
            'logo' => 'honda.png',
        ]);

        \App\Models\Clients::create([
            'name' => 'LENMARC',
            'logo' => 'lenmarc.png',
        ]);
    }
}
