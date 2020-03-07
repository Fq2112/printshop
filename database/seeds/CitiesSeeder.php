<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'Accept' => 'application/json',
                'key' => '7a5350ebe62d80bfc367071ba78ecd84'
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['rajaongkir']['results'] as $datum) {
//            $convert = json_decode($datum,true);
            \App\Models\Cities::create([
                'province_id' => $datum['province_id'],
                'name' => $datum['city_name'],
                'type' => $datum['type'],
                'postal_code' => $datum['postal_code']
            ]);
//            $this->command->info('Adding ' + $datum['province'] + 'To Table');
        }
    }
}
