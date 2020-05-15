<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Mail\Users\InvoiceMail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Models\PromoCode;
use App\Support\StatusProgress;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $bio = $user->getBio;

        $archive = Cart::where('user_id', $user->id)->where('isCheckout', false)
            ->orderByDesc('created_at')->get()->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->formatLocalized('%B %Y');
            });
        $carts = $archive;

        $addresses = Address::where('user_id', $user->id)->orderByDesc('id')->get();

        $a = 1;
        $b = 1;
        $c = 1;
        $d = 1;
        $e = 1;
        $total_item = Cart::where('user_id', $user->id)->where('isCheckout', false)->get();
        $subtotal = 0;
        $ongkir = 0;

        return view('pages.main.users.cart', compact('user', 'bio', 'carts', 'addresses',
            'a', 'b', 'c', 'd', 'e', 'total_item', 'subtotal', 'ongkir'));
    }

    public function editDesign(Request $request)
    {
        $cart = Cart::find($request->id);
        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;
        $specs = !is_null($cart->subkategori_id) ? $data->getSubkatSpecs : $data->getClusterSpecs;
        $size = !is_null($cart->file) ? Storage::size('public/users/order/design/' . $cart->user_id . '/' . $cart->file) : 0;
        $path = !is_null($cart->file) ? asset('storage/users/order/design/' . Auth::id() . '/' . $cart->file) : null;

        return [
            'is_design' => $specs->is_design == true ? 1 : 0,
            'file' => $cart->file, 'size' => $size, 'path' => $path, 'link' => $cart->link
        ];
    }

    public function updateOrder(Request $request)
    {
        $cart = Cart::find($request->id);
        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;

        if ($request->has('note')) {
            if (!is_null($cart->note)) {
                $message = __('lang.alert.cart-note2', ['param' => $data->name]);
            } else {
                $message = __('lang.alert.cart-note', ['param' => $data->name]);
            }

            $cart->update(['note' => $request->note]);

        } else {
            if ($request->hasFile('file')) {
                $this->validate($request, ['file' => 'required|mimes:jpg,jpeg,png,tiff,pdf,zip,rar|max:204800']);
                $file = $request->file('file')->getClientOriginalName();
                if ($cart->file != '') {
                    Storage::delete('public/users/order/design/' . Auth::id() . '/' . $cart->file);
                }
                $request->file('file')->storeAs('public/users/order/design/' . Auth::id(), $file);
                $link = null;
            } else {
                if (is_null($request->link)) {
                    $file = $cart->file;
                    $link = null;
                } else {
                    if ($cart->file != '') {
                        Storage::delete('public/users/order/design/' . Auth::id() . '/' . $cart->file);
                    }
                    $file = null;
                    $link = $request->link;
                }
            }

            $cart->update(['file' => $file, 'link' => $link]);

            $message = __('lang.alert.cart-design', ['param' => $data->name]);
        }

        return back()->with('update', $message);
    }

    public function deleteNote(Request $request)
    {
        $cart = Cart::find($request->id);
        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;

        $cart->update(['note' => null]);

        return back()->with('delete', __('lang.alert.cart-note3', ['param' => $data->name]));
    }

    public function cariPromo(Request $request)
    {
        $promo = PromoCode::where('promo_code', $request->kode)->first();
        $payment = PaymentCart::where('promo_code', $request->kode)->where('user_id', Auth::id())->first();

        if ($promo) {
            if ($payment) {
                return 1;
            } else {
                if (now() > $promo->end) {
                    return 2;
                } else {
                    $discount_price = $request->subtotal * $promo->discount / 100;
                    $subtotal = $request->subtotal - $discount_price;
                    $total = $subtotal + $request->ongkir;
                    return [
                        'caption' => $promo->description,
                        'discount' => $promo->discount,
                        'total' => $total,
                        'str_discount' => '-Rp' . number_format($discount_price, 2, ',', '.'),
                        'str_total' => 'Rp' . number_format($total, 2, ',', '.')
                    ];
                }
            }
        } else {
            return 0;
        }
    }

    public function checkout(Request $request)
    {
        $carts = Cart::whereIn('id', explode(',', $request->cart_ids))
            ->orderByRaw('FIELD (id, ' . $request->cart_ids . ') ASC')->get();
        $code = strtoupper(uniqid('PYM') . now()->timestamp);

        foreach ($carts as $cart) {
            PaymentCart::create([
                'user_id' => $cart->user_id,
                'address_id' => $request->address_id,
                'cart_id' => $cart->id,
                'uni_code_payment' => $code,
                'token' => uniqid(),
                'price_total' => $cart->total,
                'promo_code' => $request->promo_code,
                'is_discount' => !is_null($request->discount) ? 1 : 0,
                'discount' => $request->discount,
            ]);

            $cart->update(['isCheckout' => true]);
        }

        $check = PaymentCart::where('uni_code_payment', $code)->where('user_id', Auth::id())->orderByDesc('id')->first();
        $data = PaymentCart::where('uni_code_payment', $code)->where('user_id', Auth::id())->orderByDesc('id')->get();

        $filename = $code . '.pdf';
        $pdf = PDF::loadView('exports.invoice', compact('code', 'data', 'check'));
        Storage::put('public/users/order/invoice/' . Auth::id() . '/' . $filename, $pdf->output());

        Mail::to(Auth::user()->email)->send(new InvoiceMail($code, $check, $data, $filename));

        return redirect()->route('user.dashboard')->with('add', __('lang.alert.checkout',
            ['qty' => count($data), 's' => count($data) > 1 ? 's' : '', 'code' => $code]));
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $bio = $user->getBio;
        $keyword = $request->q;
        $category = $request->filter;

        $archive_unpaid = PaymentCart::where('user_id', $user->id)->where('finish_payment', false)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder');
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder')
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder');
                    })->where('user_id', $user->id)->where('finish_payment', false);
            })->orderByDesc('id')->get()->groupBy('uni_code_payment');
        $unpaid = $archive_unpaid;

        $archive_paid = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder');
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder')
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id)->where('isCheckout', true)->doesntHave('getOrder');
                    })->where('user_id', $user->id)->where('finish_payment', true);
            })->orderByDesc('id')->get()->groupBy('uni_code_payment');
        $paid = $archive_paid;

        $archive_produced = Order::where('progress_status', StatusProgress::START_PRODUCTION)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id);
                    })->where('progress_status', StatusProgress::START_PRODUCTION);
            })->orWhere('progress_status', StatusProgress::FINISH_PRODUCTION)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id);
                    })->where('progress_status', StatusProgress::FINISH_PRODUCTION);
            })->orderByDesc('updated_at')->get()->groupBy('uni_code');
        $produced = $archive_produced;

        $archive_shipped = Order::where('progress_status', StatusProgress::SHIPPING)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id);
                    })->where('progress_status', StatusProgress::SHIPPING);
            })->orderByDesc('updated_at')->get()->groupBy('uni_code');
        $shipped = $archive_shipped;

        $archive_received = Order::where('progress_status', StatusProgress::RECEIVED)
            ->whereHas('getCart', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id);
                    })->where('progress_status', StatusProgress::RECEIVED);
            })->orderByDesc('updated_at')->get()->groupBy('uni_code');
        $received = $archive_received;

        $all = count($paid) + count($unpaid) + count($produced) + count($shipped) + count($received);

        return view('pages.main.users.dashboard', compact('user', 'bio', 'keyword', 'category',
            'unpaid', 'paid', 'produced', 'shipped', 'received', 'all'));
    }

    public function downloadFile(Request $request)
    {
        $cart = Cart::find(decrypt($request->id));

        if ($request->file == 'design') {
            if (!is_null($cart->file)) {
                $file_path = storage_path('app/public/users/order/design/' . $cart->user_id . '/' . $cart->file);
                if (file_exists($file_path)) {
                    return Response::download($file_path, $cart->file, [
                        'Content-Length: ' . filesize($file_path)
                    ]);
                } else {
                    return 0;
                }
            } else {
                return $cart->link;
            }

        } else {
            $invoice = $cart->getPayment->uni_code_payment . '.pdf';
            $file_path = storage_path('app/public/users/order/invoice/' . $cart->user_id . '/' . $invoice);
            if (file_exists($file_path)) {
                return Response::download($file_path, $invoice, [
                    'Content-Length: ' . filesize($file_path)
                ]);
            } else {
                return 0;
            }
        }
    }

    public function received(Request $request)
    {
        $order = Order::where('uni_code', $request->code)->first();
        $data = !is_null($order->getCart->subkategori_id) ? $order->getCart->getSubKategori : $order->getCart->getCluster;

        $order->update(['progress_status' => StatusProgress::RECEIVED]);

        return back()
            ->with('update', __('lang.alert.order-received', ['code' => $order->uni_code, 'name' => $data->name]));
    }

    public function reorder(Request $request)
    {
        $order = Order::where('uni_code', $request->code)->first();
        $cart = $order->getCart;

        Cart::create([
            'user_id' => $cart->user_id,
            'subkategori_id' => !is_null($cart->subkategori_id) ? $cart->subkategori_id : null,
            'cluster_id' => !is_null($cart->cluster_id) ? $cart->cluster_id : null,
            'address_id' => $cart->address_id,
            'material_id' => $cart->material_id,
            'type_id' => $cart->type_id,
            'balance_id' => $cart->balance_id,
            'page_id' => $cart->page_id,
            'copies_id' => $cart->copies_id,
            'size_id' => $cart->size_id,
            'width' => $cart->width,
            'length' => $cart->length,
            'lamination_id' => $cart->lamination_id,
            'side_id' => $cart->side_id,
            'edge_id' => $cart->edge_id,
            'color_id' => $cart->color_id,
            'finishing_id' => $cart->finishing_id,
            'folding_id' => $cart->folding_id,
            'front_side_id' => $cart->front_side_id,
            'right_side_id' => $cart->right_side_id,
            'left_side_id' => $cart->left_side_id,
            'back_side_id' => $cart->back_side_id,
            'front_cover_id' => $cart->front_cover_id,
            'back_cover_id' => $cart->back_cover_id,
            'binding_id' => $cart->binding_id,
            'print_method_id' => $cart->print_method_id,
            'material_cover_id' => $cart->material_cover_id,
            'side_cover_id' => $cart->side_cover_id,
            'cover_lamination_id' => $cart->cover_lamination_id,
            'lid_id' => $cart->lid_id,
            'orientation_id' => $cart->orientation_id,
            'extra_id' => $cart->extra_id,
            'holder_id' => $cart->holder_id,
            'material_color_id' => $cart->material_color_id,
            'qty' => $cart->qty,
            'price_pcs' => $cart->price_pcs,
            'production_finished' => $cart->production_finished,
            'ongkir' => $cart->ongkir,
            'delivery_duration' => $cart->delivery_duration,
            'received_date' => $cart->received_date,
            'total' => $cart->total,
            'file' => $cart->file,
            'link' => $cart->link,
        ]);

        return redirect()->route('user.cart')->with('add', __('lang.alert.reorder-cart',
            ['param' => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name]));
    }
}
