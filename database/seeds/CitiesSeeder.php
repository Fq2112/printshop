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
        $response = $client->request('GET', 'https://sandbox-api.shipper.id/public/v1/cities?apiKey=9f8ee8391f2ea2275c67e74bcedae532&origin=all', [
            'headers' => [
                'Accept' => 'application/json',
                'User-Agent' => 'Shipper/'
            ],
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        foreach ($data['data']['rows'] as $datum) {
//            $convert = json_decode($datum,true);
            $city = \App\Models\Cities::create([
                'id' => $datum['id'],
                'province_id' => $datum['province_id'],
                'name' => $datum['name'],
            ]);
//            $this->command->info('Adding ' + $datum['province'] + 'To Table');

            $responseSuburbs = $client->request('GET',
                'https://sandbox-api.shipper.id/public/v1/suburbs?apiKey=9f8ee8391f2ea2275c67e74bcedae532&city=' . $city->id, [
                'headers' => [
                    'Accept' => 'application/json',
                    'User-Agent' => 'Shipper/'
                ],
            ]);
            $dataSuburbs = json_decode($responseSuburbs->getBody()->getContents(), true);
                foreach ($dataSuburbs['data']['rows'] as $item){
                    \App\Models\Suburbs::create([
                        'id' => $item['id'],
                        'cities_id' => $city->id,
                        'name' => $item['name'],
                    ]);
                }
        }
    }
}
