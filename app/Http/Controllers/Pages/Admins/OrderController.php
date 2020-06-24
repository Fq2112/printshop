<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\Role;
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
        })->where('finish_payment', true)
            ->distinct('uni_code_payment')->select('uni_code_payment', 'user_id', 'updated_at')->orderBy('updated_at', 'DESC')->get();
        return view('pages.main.admins.payment', [
            'data' => $data
        ]);
    }

    public function show_order($condition, Request $request)
    {
        $data = [];
        $status = '';
        $data = Order::whereNotIn('id', ['0'])->when($request->status, function ($query) use ($request) {
            $query->where('progress_status', $request->status);
        })->when($request->period, function ($query) use ($request) {
            $query->whereBetween('updated_at', [Carbon::now()->subDay($request->period), Carbon::now()]);
        })->whereHas('getCart', function ($query) use ($condition) {
            $query->whereHas('getPayment', function ($query) use ($condition) {
                $query->where('uni_code_payment', $condition);
            });
        })->get();

        return view('pages.main.admins.order', [
            'title' => 'Order List',
            'kategori' => $data,
            'status' => $status
            , 'code' => $condition
        ]);
    }

    public function order_detail($id)
    {
        $data = Order::find($id);

        return view('pages.main.admins.order_detail', [
            'data' => $data,
        ]);
    }

    public function get_file(Request $request)
    {
        try {
            $cart = Cart::find($request->cart_id);
//            dd($cart);
            $file_path = asset('storage/users/order/design/' . $cart->user_id . '/' . $cart->file);
            if (file_exists($file_path)) {
                return Response::download($file_path, $request->file, [
                    'Content-length : ' . filesize($file_path)
                ]);
            } else {
                return response()->json(['error' => "The file you looking for is gone"], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
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

    public function proceed_order(Request $request)
    {
        $order = Order::find($request->id);

        if ($order->progress_status == StatusProgress::NEW) {
            $order->update([
                'progress_status' => StatusProgress::START_PRODUCTION
            ]);
        } elseif ($order->progress_status == StatusProgress::START_PRODUCTION || $order->progress_status == StatusProgress::FINISH_PRODUCTION) {
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

    public function create_pdf(Request $request)
    {
        $filename = $request->code . '.pdf';
        $data = Order::whereHas('getCart', function ($query) use ($request) {
            $query->whereHas('getPayment', function ($query) use ($request) {
                $query->where('uni_code_payment', $request->code);
            });
        })->get();
        $pdf = PDF::loadView('exports.production', [
            'order' => $data,
            'code' => $request->code
        ]);
        Storage::put('public/users/order/invoice/owner/' . $filename, $pdf->output());


        foreach ($data as $item) { //create PDF for Shipping Label
            $labelname = $item->uni_code . '.pdf';
            $labelPdf = PDF::loadView('exports.shipping', [
                'code' => $request->code,
                'order' => $item
            ]);
            Storage::put('public/users/order/invoice/owner/prodution/' . $request->code . '/' . $labelname, $labelPdf->output());
        }

        return response()->json([
            'message' => 'PDF Created'
        ], 201);
//        $file_path = asset('storage/users/order/invoice/owner/' .$filename);
//        return response()->download($file_path, 'Production_'.$filename, [
//            'Content-length : ' . filesize($file_path)
//        ]);
    }

    public function download_production(Request $request)
    {
        $filename = $request->code . '.pdf';
        $file_path = asset('storage/users/order/invoice/owner/' . $filename);
        return Response::download($file_path, 'Production_' . $filename, [
            'Content-length : ' . filesize($file_path)
        ]);
    }

    public function download_invoice(Request $request)
    {
        $filename = $request->code . '.pdf';
        $file_path = asset('storage/users/order/invoice/' . $request->user_id . '/' . $filename);
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

    public function shipping()
    {
        $code = 'PYM5EE6262B5F30D1592141355';

        $data = Order::whereHas('getCart', function ($query) use ($code) {
            $query->whereHas('getPayment', function ($query) use ($code) {
                $query->where('uni_code_payment', $code);
            });
        })->get();
        return view('exports.shipping', [
            'data' => $data
        ]);
    }
}
