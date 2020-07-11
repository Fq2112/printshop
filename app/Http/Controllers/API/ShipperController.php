<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Areas;
use App\Models\Suburbs;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
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
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'User-Agent' => 'Shipper/',
                'Accept' => 'application/json',
            ],
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        try {
            $response = $client->get('https://sandbox-api.shipper.id/public/v1/domesticRates?apiKey=' .
                env('SHIPPER_KEY') . '&o=30149&originCoord=-7.250445,112.768845' .
                '&d=' . $request->d . '&destinationCoord=' . $request->destinationCoord .
                '&wt=' . $request->wt . '&v=' . $request->v .
                '&l=' . $request->l . '&w=' . $request->w . '&h=' . $request->h)->getBody()->getContents();

            return json_decode($response, true);

        } catch (ConnectException $e) {
            return response()->json();
        }
    }
}
