<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\Role;
use App\Support\StatusProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PHPMailer\PHPMailer\Exception;

class OrderController extends Controller
{

    public function order()
    {
        $data = PaymentCart::where('finish_payment',true)->distinct('uni_code_payment')->select('uni_code_payment', 'user_id', 'updated_at')->get();
        return view('pages.main.admins.payment',[
            'data' => $data
        ]);
    }

    public function show_promo($condition, Request $request)
    {
        $data = [];
        $status = '';
        if ($condition == StatusProgress::NEW) {
//            $data = Order::where('progress_status', StatusProgress::NEW)->get();
            $data = Order::whereNotIn('id', ['0'])->when($request->status, function ($query) use ($request) {
                $query->where('progress_status', $request->status);
            })->when($request->period, function ($query) use ($request) {
                $query->whereBetween('updated_at', [Carbon::now()->subDay($request->period), Carbon::now()]);
            })->get();


            $status = $condition;
        } elseif ($condition == StatusProgress::START_PRODUCTION || $condition == StatusProgress::FINISH_PRODUCTION) {
            $data = Order::where('progress_status', StatusProgress::START_PRODUCTION)->orWhere('progress_status', StatusProgress::FINISH_PRODUCTION)->get();
            $status = $condition;
        } elseif ($condition == StatusProgress::SHIPPING) {
            $data = Order::where('progress_status', StatusProgress::SHIPPING)->get();
            $status = $condition;
        } elseif ($condition == StatusProgress::RECEIVED) {
            $data = Order::where('progress_status', StatusProgress::RECEIVED)->get();
            $status = $condition;
        }

        return view('pages.main.admins.order', [
            'title' => 'Order List',
            'kategori' => $data,
            'status' => $status
        ]);
    }

    public function detail_data($id)
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
            $file_path = storage_path('app/public/user/order/design/' . $cart->user_id . '/' . $cart->file);
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
}
