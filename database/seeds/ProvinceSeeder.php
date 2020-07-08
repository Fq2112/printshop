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
        $response = $client->request('GET', 'https://sandbox-api.shipper.id/public/v1/provinces?apiKey=9f8ee8391f2ea2275c67e74bcedae532', [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'Shipper/'
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);

        foreach ($data['data']['rows'] as $datum) {
//            $convert = json_decode($datum,true);
            \App\Models\Province::create([
                'id' => $datum['id'],
                'name' => $datum['name']
            ]);
//            $this->command->info('Adding ' + $datum['province'] + 'To Table');
        }
    }
}
