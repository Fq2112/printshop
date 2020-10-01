<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Models\PromoCode;
use App\Support\StatusProgress;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\Exception;

class OrderController extends Controller
{

    public function order(Request $request)
    {
//        dd($request->all());
        $data = PaymentCart::when($request->period, function ($query) use ($request) {
            $query->whereBetween('updated_at', [Carbon::now()->subDay($request->period), Carbon::now()]);
        })->when($request->status, function ($query) use ($request) {
            $query->where('finish_payment', $request->status);
        })->orderBy('updated_at', 'DESC')->get();
        return view('pages.main.admins.payment', [
            'data' => $data
        ]);
    }

    public function show_order($condition, Request $request)
    {
        $status = '';
        $payment = PaymentCart::where('uni_code_payment', $condition)->first();

        $order = [];
        foreach ($payment->cart_ids as $item) {
            $order_item = \App\Models\Order::whereRaw('SUBSTRING_INDEX(uni_code,"-",-1) = ' . $item)->when($request->status, function ($query) use ($request) {
                $query->where('progress_status', $request->status);
            })->when($request->period, function ($query) use ($request) {
                $query->whereBetween('updated_at', [Carbon::now()->subDay($request->period), Carbon::now()]);
            })->first();
            if (!empty($order_item)) {
                $order_item->setAttribute('cart_id', $item);
            }

            array_push($order, $order_item);
        }

        $data = Order::whereNotIn('id', ['0'])->when($request->status, function ($query) use ($request) {
            $query->where('progress_status', $request->status);
        })->when($request->period, function ($query) use ($request) {
            $query->whereBetween('updated_at', [Carbon::now()->subDay($request->period), Carbon::now()]);
        })->get();

        return view('pages.main.admins.order', [
            'title' => 'Order List',
            'kategori' => $order,
            'status' => $status,
            'code' => $condition
        ]);
    }

    public function order_detail(Request $request)
    {
        $data = Cart::find($request->id);

        return view('pages.main.admins._partials.modal.detail_cart', [
            'cart' => $data,
            'order' => $request->order_id
        ]);
    }

    public function get_file(Request $request)
    {
        $cart = Cart::find(decrypt($request->id));
        if (!is_null($cart->file)) {
            $file_path = storage_path('app/public/users/order/design/' . $cart->user_id . '/' . $cart->file);
            if (file_exists($file_path)) {
                return Response::download($file_path, $cart->file, [
                    'Content-Length: ' . filesize($file_path)
                ]);
            } else {
                return back()->with('warning', __('lang.alert.download-fail'));
            }
        } else {
            return redirect()->to($cart->link);
        }
    }

    public function create_data(Request $request)
    {
        $check = Order::where('promo_code', $request->promo_code)->first();

        if (empty($check)) {
            PromoCode::create([
                'promo_code' => $request->promo_code,
                'start' => Carbon::parse($request->start),
                'end' => Carbon::parse($request->end),
                'description' => $request->description,
                'discount' => $request->discount,
            ]);
            return back()->with('success', 'Successfully add new Promo!');
        } else {
            return back()->with('error', 'Promo Code already taken please use another name');
        }
    }

    public function proceed_order_mass(Request $request)
    {
        $array_order = explode(',', $request->order_ids);

        foreach ($array_order as $item) {
            $order = Order::find($item);
            if ($order->progress_status == StatusProgress::NEW) {
                $order->update([
                    'progress_status' => StatusProgress::START_PRODUCTION
                ]);
            } elseif ($order->progress_status == StatusProgress::START_PRODUCTION) {
                $order->update([
                    'progress_status' => StatusProgress::FINISH_PRODUCTION
                ]);
            } elseif ($order->progress_status == StatusProgress::FINISH_PRODUCTION) {
                $order->update([
                    'progress_status' => StatusProgress::SHIPPING
                ]);
            }
        }
        return back()->with('success', 'Order Successfully Updated!');
    }

    public function proceed_order(Request $request)
    {
        $order = Order::find($request->id);
        if ($order->progress_status == StatusProgress::NEW) {
            $order->update([
                'progress_status' => StatusProgress::START_PRODUCTION
            ]);
        } elseif ($order->progress_status == StatusProgress::START_PRODUCTION) {
            $order->update([
                'progress_status' => StatusProgress::FINISH_PRODUCTION
            ]);
        } elseif ($order->progress_status == StatusProgress::FINISH_PRODUCTION) {
            $order->update([
                'progress_status' => StatusProgress::SHIPPING
            ]);
        }
        return back()->with('success', 'Order Successfully Updated!');

    }

    public function ger_data($id)
    {
        $data = Order::find($id);
        return $data;
    }

    public function update_data(Request $request)
    {
        $promo = Order::find($request->id);
        $promo->update([
            'promo_code' => $request->promo_code,
            'start' => Carbon::parse($request->start),
            'end' => Carbon::parse($request->end),
            'description' => $request->description,
            'discount' => $request->discount,
        ]);
        return back()->with('success', 'Successfully add new Promo!');

    }

    public function delete_data($id)
    {
        $post = Order::find(decrypt($id));

        $post->delete();

        return back()->with('success', __('admin.alert.blog.delete', ['param' => $post->title]));
    }

    public function create_pdf($code)
    {
        $filename = $code . '.pdf';

        $payment = \App\Models\PaymentCart::where('uni_code_payment', $code)->first();

        $pdf = PDF::loadView('exports.production', [
            'code' => $code
        ]);

        Storage::put('public/users/order/invoice/owner/' . $filename, $pdf->output());

        return response()->json([
            'message' => 'PDF Created'
        ], 201);
    }

    public function download_production(Request $request,$code)
    {

        $this->create_pdf($code);
        sleep(1);
        $filename = $code . '.pdf';
        $file_path = storage_path('app/public/users/order/invoice/owner/' . $filename);
        if (file_exists($file_path)) {
            return Response::download($file_path, 'Production_' . $filename, [
                'Content-length : ' . filesize($file_path)
            ]);
        } else {
            return \response()->json([
                'message' => "Oops! The current file you are looking for is not available "
            ], 404);
        }
    }

    public function download_shipping(Request $request)
    {
        $filename = $request->code . '.pdf';
        $file_path = storage_path('app/public/users/order/invoice/owner/prodution/' . $request->code . '/' . $filename);
        if (file_exists($file_path)) {
            return Response::download($file_path, 'Shipping_Label_' . $filename, [
                'Content-length : ' . filesize($file_path)
            ]);
        } else {
            return \response()->json([
                'message' => "Oops! The current file you are looking for is not available "
            ], 404);
        }
    }

    public function download_invoice(Request $request)
    {
        $filename = $request->code . '.pdf';
        $file_path = storage_path('app/public/users/order/invoice/' . $request->user_id . '/' . $filename);
        if (file_exists($file_path)) {
            return Response::download($file_path, 'Invoice_' . $filename, [
                'Content-length : ' . filesize($file_path)
            ]);
        } else {
            return \response()->json([
                'message' => "Oops! The current file you are looking for is not available "
            ], 404);
        }
    }

    public function get_invoice_($code,$user_id)
    {
        $filename = $code . '.pdf';
        $file_path = storage_path('app/public/users/order/invoice/' . $user_id . '/' . $filename);
        if (file_exists($file_path)) {
            return Response::download($file_path, 'Invoice_' . $filename, [
                'Content-length : ' . filesize($file_path)
            ]);
        } else {
            return back()->with('error',"Oops! The current file you are looking for is not available ");
        }
    }

    public function shipping($code)
    {
        $payment = \App\Models\PaymentCart::where('uni_code_payment', $code)->first();

        $responseDetail = $this->guzzle('GET', '/orders/' . $payment->tracking_id . '?apiKey=' . env('SHIPPER_KEY'), []);
        $responseDatadetail = json_decode($responseDetail->getBody(), true);
//        dd($responseDatadetail['data']['order']);
        return view('exports.shipping', [
            'data' => $payment,
            'detail' => $responseDatadetail['data']['order']
        ]);
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
