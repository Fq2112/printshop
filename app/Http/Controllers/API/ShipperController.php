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
            $response = $this->client->get(env('SHIPPER_BASE_URL') . '/domesticRates?apiKey=' . $this->key .
                '&o=30149&originCoord=-7.250445,112.768845' .
                '&d=' . $request->d . '&destinationCoord=' . $request->destinationCoord .
                '&wt=' . $request->wt . '&v=' . $request->v .
                '&l=' . $request->l . '&w=' . $request->w . '&h=' . $request->h)->getBody()->getContents();

            return json_decode($response, true);

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
