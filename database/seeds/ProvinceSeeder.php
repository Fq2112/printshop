<?php

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'Accept'        => 'application/json',
                'key' => env('RajaOngkir_KEY')
            ],
        ]);
        $data =  json_decode($response->getBody()->getContents(),true);

        foreach ($data['rajaongkir']['results'] as $datum){
//            $convert = json_decode($datum,true);
            \App\Models\Province::create([
               'name' => $datum['province']
            ]);
//            $this->command->info('Adding ' + $datum['province'] + 'To Table');
        }
    }
}
