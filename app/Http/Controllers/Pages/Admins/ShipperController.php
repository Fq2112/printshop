<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\PaymentCart;
use Egulias\EmailValidator\Exception\ExpectingQPair;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use GuzzleHttp\Client;

class ShipperController extends Controller
{
    public function showModal(Request $request)
    {
        $dataPay = PaymentCart::where('uni_code_payment', $request->code)->first();
        $order = [];
        foreach ($dataPay->cart_ids as $item) {
            $order_item = \App\Models\Order::whereRaw('SUBSTRING_INDEX(uni_code,"-",-1) = ' . $item)->first();
            $order_item->setAttribute('cart_id', $item);
            array_push($order, $order_item);
        }

        return view('pages.main.admins._partials.modal.create_shipper', [
            'code' => $request->code,
            'data' => $order,
            'payment' => $dataPay
        ]);
    }

    public function postOrder(Request $request)
    {
        try {
            $length = 0;
            $height = 0;
            $width = 0;
            $weightTotal = 0;
            $value = 0;
            $itemName = [];
            $data = PaymentCart::find($request->id);

            foreach ($data->cart_ids as $datum) {
                $cart = Cart::find($datum);
                $specs = !is_null($cart->subkategori_id) ? $cart->getSubKategori->getSubkatSpecs : $cart->getCluster->getClusterSpecs;
                $weight = ($specs->weight / 1000) * $cart->qty; //in Kg
                $weightTotal = $weightTotal + $weight;
                $height_item = $specs->height * $cart->qty;
                $height = $height + $height_item;
                $value = $value + $cart->total;
                if ($length < $specs->length) {
                    $length = $specs->length;
                }
                if ($width < $specs->width) {
                    $width = $specs->width;
                }

                $aray_item = [
                    "name" => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name,
                    "qty" => $cart->qty,
                    "value" => $cart->total
                ];
                array_push($itemName, $aray_item);

            }

            $form = [
                "o" => 30149,
                "d" => $data->getShippingAddress->area_id,
                "wt" => $weightTotal,
                "l" => $length,
                "w" => $width,
                "h" => $height,
                "v" => $value,
                "rateID" => $data->rate_id,
                "consigneeName" => $data->getUser->name,
                "consigneePhoneNumber" => $data->getUser->getBio->phone,
                "consignerName" => "Premier Printshop",
                "consignerPhoneNumber" => "0313814969",
                "originAddress" => "Raya Kenjeran 469 Gading, Tambaksari, Surabaya, Jawa Timur – 60134.",
                "originDirection" => "q",
                "destinationAddress" => $data->getShippingAddress->address . " - " . $data->getShippingAddress->postal_code,
                "destinationDirection" => "w",
                "itemName" => json_encode($itemName),
                "contents" => "show",
                "useInsurance" => 0,
                "packageType" => 2,
                "paymentType" => "cash",
                "externalID" => $data->uni_code_payment . "|" . now()->timestamp,
                "cod" => 0,

            ];
//            dd($form);
            $jsonform = json_encode($form);
            $response = $this->guzzle('POST', '/orders/domestics?apiKey='.env('SHIPPER_KEY'), $form);

            $ersponseData = json_decode($response->getBody(), true);


            $responseTracking = $this->guzzle('GET', '/orders?apiKey='.env('SHIPPER_KEY').'&id=5f057d26271157007be8f5b0', []);
            $responseDataTracking = json_decode($responseTracking->getBody(), true);
            $data->update([
                'shipping_id' => $ersponseData['data']['id'],
                'tracking_id' => $responseDataTracking['data']['id']
            ]);

            return back()->with('success', $ersponseData['data']['content']." & ".$responseDataTracking['data']['content']);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getAgents(Request $request)
    {
        try {
            $response = $this->guzzle('GET', '/agents?apiKey='.env('SHIPPER_KEY').'&suburbId=2581', []);
            $responseData = json_decode($response->getBody(), true);
dd($responseData);
            return view('pages.main.admins._partials.modal.shipper_agents',[
                'data' => $responseData
            ]);
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    function guzzle($method, $url, $form)
    {
        $base_url = env('SHIPPER_BASE_URL');
        $client = new \GuzzleHttp\Client();
        $response = $client->request($method, $base_url . $url, [
            'headers' => [
                'Accept' => 'application/json',

                'User-Agent' => 'Shipper/',
            ],
            'form_params' => $form
        ]);

        return $response;
    }
}
