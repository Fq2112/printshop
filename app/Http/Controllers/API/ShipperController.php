<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\Suburbs;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    protected $client, $key;

    public function __construct()
    {
        $this->key = env('SHIPPER_KEY');
        $this->client = new \GuzzleHttp\Client([
            'headers' => [
                'User-Agent' => 'Shipper/',
                'Accept' => 'application/json',
            ],
            'defaults' => [
                'exceptions' => false
            ]
        ]);
    }

    public function getLocation(Request $request)
    {
        if ($request->q == 'suburb') {
            $data = Suburbs::where('cities_id', $request->id)->get();
        } else {
            $data = Areas::where('suburbs_id', $request->id)->get();
        }

        return $data;
    }

    public function getRates(Request $request)
    {
        try {
            $response = json_decode($this->client->get(env('SHIPPER_BASE_URL') . '/domesticRates?apiKey=' . $this->key .
                '&o=30149&originCoord=-7.250445,112.768845' .
                '&d=' . $request->d . '&destinationCoord=' . $request->destinationCoord .
                '&wt=' . $request->wt . '&v=' . $request->v .
                '&l=' . $request->l . '&w=' . $request->w . '&h=' . $request->h)->getBody()->getContents(), true);

            $data = $response['data']['rates']['logistic']['regular'];
            foreach ($data as $i => $row) {
                if (strpos(strtolower($row['name']), 'alfatrex') !== false) {
                    $logo = asset('images/logistic/Alfatrex.png');
                } elseif (strpos(strtolower($row['name']), 'jne') !== false) {
                    $logo = asset('images/logistic/JNE.png');
                } elseif (strpos(strtolower($row['name']), 'j&t') !== false) {
                    $logo = asset('images/logistic/JNT.png');
                } elseif (strpos(strtolower($row['name']), 'lion') !== false) {
                    $logo = asset('images/logistic/LPA.png');
                } elseif (strpos(strtolower($row['name']), 'sap') !== false) {
                    $logo = asset('images/logistic/SAP.png');
                } elseif (strpos(strtolower($row['name']), 'sicepat') !== false) {
                    $logo = asset('images/logistic/SCP.png');
                } elseif (strpos(strtolower($row['name']), 'tiki') !== false) {
                    $logo = asset('images/logistic/TIK.png');
                } elseif (strpos(strtolower($row['name']), 'wahana') !== false) {
                    $logo = asset('images/logistic/WHN.png');
                } else {
                    $logo = asset('images/logistic/404.png');
                }

                $data[$i] = array_replace($data[$i], ['logo_url' => $logo]);
            }

            return $data;

        } catch (ConnectException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid key. API key tidak ditemukan di database SHIPPER'
            ], 400);
        }
    }

    public function getWaybill(Request $request)
    {
        try {
            $response = $this->client->get(env('SHIPPER_BASE_URL') . '/orders/' . $request->id . '?apiKey=' . $this->key);

            return json_decode($response->getBody()->getContents(), true);

        } catch (ConnectException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid key. API key tidak ditemukan di database SHIPPER'
            ], 400);
        }
    }
}
