<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
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
                env('SHIPPER_KEY') . '&o=123&d=' . $request->d . '&wt=' . $request->wt . '&v=' . $request->v .
                '&l=' . $request->l . '&w=' . $request->w . '&h=' . $request->h)->getBody()->getContents();

            return json_decode($response, true);

        } catch (ConnectException $e) {
            return response()->json();
        }
    }
}
