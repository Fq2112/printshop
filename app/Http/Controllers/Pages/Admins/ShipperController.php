<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\StatusProgress;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Egulias\EmailValidator\Exception\ExpectingQPair;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;
use GuzzleHttp\Client;

class ShipperController extends Controller
{
    public function showModal(Request $request)
    {
        $dataPay = PaymentCart::where('uni_code_payment', $request->code)->first();
        $order = [];
        $status = 0;
        foreach ($dataPay->cart_ids as $item) {
            $order_item = \App\Models\Order::whereRaw('SUBSTRING_INDEX(uni_code,"-",-1) = ' . $item)->first();
            if ($order_item->progress_status == StatusProgress::NEW || $order_item->progress_status == StatusProgress::START_PRODUCTION ){
                $status ++;
            }
            $order_item->setAttribute('cart_id', $item);
            array_push($order, $order_item);
        }

        return view('pages.main.admins._partials.modal.create_shipper', [
            'code' => $request->code,
            'data' => $order,
            'payment' => $dataPay,
            'status' => $status
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
                "consignerName" => env('APP_NAME'),
                "consignerPhoneNumber" => "0313814969",
                "originAddress" => "Raya Kenjeran 469 Gading, Tambaksari, Surabaya, Jawa Timur – 60134.",
                "originDirection" => "q",
                "destinationAddress" => $data->getShippingAddress->address . " - " . $data->getShippingAddress->postal_code,
                "itemName" => $itemName,
                "contents" => "show",
                "useInsurance" => 0,
                "packageType" => 2,
                "paymentType" => "cash",
                "externalID" => $data->uni_code_payment . "|" . now()->timestamp,
                "cod" => 0,

            ];



            $response = $this->guzzle('POST', '/orders/domestics?apiKey=' . env('SHIPPER_KEY'), $form);
            $ersponseData = json_decode($response->getBody(), true);


            $responseTracking = $this->guzzle('GET', '/orders?apiKey=' . env('SHIPPER_KEY') . '&id=' . $ersponseData['data']['id'], []);
            $responseDataTracking = json_decode($responseTracking->getBody(), true);

            $Activeresponse = $this->guzzle('PUT', '/activations/' . $responseDataTracking['data']['id'] . '?apiKey=' . env('SHIPPER_KEY'), [
                'active' => 1
            ]);

            $ActiveresponseData = json_decode($Activeresponse->getBody(), true);

            $responseDetail = $this->guzzle('GET', '/orders/' . $responseDataTracking['data']['id'] . '?apiKey=' . env('SHIPPER_KEY'), []);
            $responseDatadetail = json_decode($responseDetail->getBody(), true);

            $data->update([
                'shipping_id' => $ersponseData['data']['id'],
                'tracking_id' => $responseDataTracking['data']['id'],
                'isActive' => true
            ]);

            $labelname = $data->uni_code_payment . '.pdf';
            $labelPdf = PDF::loadView('exports.shipping', [
                'data' => $data,
                'detail' => $responseDatadetail['data']['order']
            ]);
            $labelPdf->setPaper('a5', 'potrait');
            Storage::put('public/users/order/invoice/owner/prodution/' . $data->uni_code_payment . '/' . $labelname, $labelPdf->output());

            foreach ($data->getOrder as $item){
                $item->update([
                    'progress_status' => StatusProgress::SHIPPING
                ]);
            }

            return back()->with('success', $ersponseData['data']['content'] . " & " . $ActiveresponseData['data']['message']);
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        } catch (ClientException $exception) {
            return back()->with('error', 'Please Try Again Later');
        }
    }

    public function getAgents(Request $request)
    {
        try {

            $response = $this->guzzle('GET', '/agents?apiKey=' . env('SHIPPER_KEY') . '&suburbId=2581', []);
            $responseData = json_decode($response->getBody(), true);

            return view('pages.main.admins._partials.modal.shipper_agents', [
                'data' => $responseData['data']['data'],
                'code' => $request->code
            ]);
        } catch (Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function postPickup(Request $request)
    {

//        try {
        $formateed = Carbon::parse($request->pickup_date)->format('Y-m-d H:i:s');
        $payment = PaymentCart::where('uni_code_payment', $request->payment_code)->first();

        $arrayOrder = [];
        array_push($arrayOrder, $payment->tracking_id);
//            dd($arrayOrder);
        $formPickup = [
            "orderIds" => $arrayOrder,
            'datePickup' => $formateed,
            'agentId' => $request->agent_id
        ];
        dd($formPickup);


        $response = $this->guzzle('POST', '/pickup?apiKey=' . env('SHIPPER_KEY'), $formPickup);

        $ersponseData = json_decode($response->getBody(), true);

        $payment->update([
            'agent_id' => $request->agent_id,
            'pick_up' => $formateed,
            'agent_name' => $request->agent_name,
            'agent_phone' => $request->agent_phone
        ]);

        return back()->with('success', $ersponseData['data']['message']);
//
//        } catch (Exception $exception) {
//            return back()->with('success', $exception->getMessage());
//        } catch (BadResponseException $exception) {
//            return back()->with('success', $exception->getMessage());
//        } catch (ConnectException $exception) {
//            return back()->with('success', $exception->getMessage());
//        } catch (RequestException $exception) {
//            return back()->with('success', $exception->getMessage());
//        }

    }

    function guzzle($method, $url, $form)
    {
        $base_url = env('SHIPPER_BASE_URL');
        $client = new \GuzzleHttp\Client();
        $response = $client->request($method, $base_url . $url, [
            'headers' => [
                'Accept' => 'application/json',
//                'Content-Type' => 'application/json',
                'User-Agent' => 'Shipper/',
            ],
            'form_params' => $form
        ]);

        return $response;
    }
}
