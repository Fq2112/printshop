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
            $city = \App\Models\Cities::create([
                'id' => $datum['id'],
                'province_id' => $datum['province_id'],
                'name' => $datum['name'],
            ]);
//            $this->command->info('Adding ' + $datum['province'] + 'To Table');

            //TODO get data Suburbs by City id
            $responseSuburbs = $client->request('GET',
                'https://sandbox-api.shipper.id/public/v1/suburbs?apiKey=9f8ee8391f2ea2275c67e74bcedae532&city=' . $city->id, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'User-Agent' => 'Shipper/'
                    ],
                ]);
            $dataSuburbs = json_decode($responseSuburbs->getBody()->getContents(), true);
            foreach ($dataSuburbs['data']['rows'] as $item) {
                $suburb = \App\Models\Suburbs::create([
                    'id' => $item['id'],
                    'cities_id' => $city->id,
                    'name' => $item['name'],
                ]);

                //TODO get Data Areas by Suburb id

                if ($suburb->id != 7023) {
                    $responseAreas = $client->request('GET',
                        'https://sandbox-api.shipper.id/public/v1/areas?apiKey=9f8ee8391f2ea2275c67e74bcedae532&suburb=' . $suburb->id, [
                            'headers' => [
                                'Accept' => 'application/json',
                                'User-Agent' => 'Shipper/'
                            ],
                        ]);
                    if ($responseAreas->getStatusCode() == '404') { //Response retrieving 404

                    } else {
                        $dataAreas = json_decode($responseAreas->getBody()->getContents(), true);
                        foreach ($dataAreas['data']['rows'] as $itemArea) {
                            \App\Models\Areas::create([
                                'id' => $itemArea['id'],
                                'suburbs_id' => $suburb->id,
                                'name' => $itemArea['name'],
                                'postal_code' => $itemArea['postcode']
                            ]);
                        }
                        $this->command->info('Adding Areas from  ' . $suburb->name . ' To Table');
                    }
                }
            }
        }
    }
}
