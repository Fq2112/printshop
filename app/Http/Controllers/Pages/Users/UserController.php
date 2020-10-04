<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\OccupancyType;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Models\PromoCode;
use App\Models\Province;
use App\Support\StatusProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $provinces = Province::all();
        $occupancies = OccupancyType::all();
        $addresses = Address::where('user_id', $user->id)->orderByDesc('id')->get();

        $a = 1;
        $b = 1;
        $c = 1;
        $d = 1;
        $e = 1;
        $total_item = Cart::where('user_id', $user->id)->where('isCheckout', false)->get();
        $total_weight = 0;
        $length = 0;
        $width = 0;
        $height = 0;
        $subtotal = 0;

        return view('pages.main.users.cart', compact('user', 'bio', 'carts', 'provinces',
            'occupancies', 'addresses', 'a', 'b', 'c', 'd', 'e', 'total_item',
            'total_weight', 'length', 'width', 'height', 'subtotal'));
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

    public function editNote(Request $request)
    {
        $cart = Cart::find($request->id);
        $data = !is_null($cart->subkategori_id) ? $cart->getSubKategori : $cart->getCluster;

        return [
            'note' => $cart->note,
            'name' => $data->name,
            'url_update' => route('user.update-order.cart', ['id' => $cart->id]),
            'url_delete' => route('user.delete-note.cart', ['id' => $cart->id]),
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
        $amount = ceil($request->subtotal);

        if ($promo) {
            if ($payment) {
                return 1;
            } else {
                if (now() > $promo->end) {
                    return 2;
                } else {
                    $discount_price = ceil($amount * $promo->discount / 100);
                    $subtotal = $amount - $discount_price;
                    $total = ceil($subtotal + $request->ongkir);
                    return [
                        'caption' => $promo->description,
                        'discount' => $promo->discount,
                        'total' => $total,
                        'discount_price' => $discount_price,
                        'str_discount' => '-Rp' . number_format($discount_price, 2, ',', '.'),
                        'str_total' => 'Rp' . number_format($total, 2, ',', '.')
                    ];
                }
            }
        } else {
            return 0;
        }
    }

    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $bio = $user->getBio;
        $keyword = $request->q;
        $category = $request->filter;

        $unpaid = PaymentCart::where('user_id', $user->id)->where('finish_payment', false)
            ->doesntHave('getOrder')->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')->where('finish_payment', false)->doesntHave('getOrder');
            })->orderByDesc('id')->get();

        $paid = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->whereHas('getOrder', function ($q) {
                $q->where('progress_status', StatusProgress::NEW);
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) {
                        $q->where('progress_status', StatusProgress::NEW);
                    });
            })->orderByDesc('id')->get();

        $produced = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                $q->where('progress_status', StatusProgress::START_PRODUCTION)
                    ->when($keyword, function ($q) use ($keyword, $user) {
                        $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                    })->orWhere('progress_status', StatusProgress::FINISH_PRODUCTION)
                    ->when($keyword, function ($q) use ($keyword, $user) {
                        $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                    });
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                        $q->where('progress_status', StatusProgress::START_PRODUCTION)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            })->orWhere('progress_status', StatusProgress::FINISH_PRODUCTION)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            });
                    });
            })->orderByDesc('id')->get();

        $shipped = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                $q->where('progress_status', StatusProgress::SHIPPING)
                    ->when($keyword, function ($q) use ($keyword, $user) {
                        $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                    });
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                        $q->where('progress_status', StatusProgress::SHIPPING)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            });
                    })->orWhere('tracking_id', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                        $q->where('progress_status', StatusProgress::SHIPPING)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            });
                    });
            })->orderByDesc('id')->get();

        $received = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                $q->where('progress_status', StatusProgress::RECEIVED)
                    ->when($keyword, function ($q) use ($keyword, $user) {
                        $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                    });
            })->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                        $q->where('progress_status', StatusProgress::RECEIVED)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            });
                    })->orWhere('tracking_id', 'LIKE', '%' . $keyword . '%')->where('finish_payment', true)
                    ->whereHas('getOrder', function ($q) use ($keyword, $user) {
                        $q->where('progress_status', StatusProgress::RECEIVED)
                            ->when($keyword, function ($q) use ($keyword, $user) {
                                $q->where('uni_code', 'LIKE', '%' . $keyword . '%');
                            });
                    });
            })->orderByDesc('id')->get();

        $all = count($paid) + count($unpaid) + count($produced) + count($shipped) + count($received);

        return view('pages.main.users.dashboard', compact('user', 'bio', 'keyword', 'category',
            'unpaid', 'paid', 'produced', 'shipped', 'received', 'all'));
    }

    public function downloadFile(Request $request)
    {
        if ($request->file == 'design') {
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

        } else {
            $payment_cart = PaymentCart::find(decrypt($request->id));
            $invoice = $payment_cart->uni_code_payment . '.pdf';
            $file_path = storage_path('app/public/users/order/invoice/' . $payment_cart->user_id . '/' . $invoice);
            if (file_exists($file_path)) {
                return Response::download($file_path, $invoice, [
                    'Content-Length: ' . filesize($file_path)
                ]);
            } else {
                return back()->with('warning', __('lang.alert.download-fail'));
            }
        }
    }

    public function received(Request $request)
    {
        $payment = PaymentCart::where('uni_code_payment', $request->code)->first();
        $payment->update(['receive_date' => now()]);

        foreach ($payment->getOrder as $row) {
            $row->update(['progress_status' => StatusProgress::RECEIVED]);
        }

        return back()->with('update', __('lang.alert.order-received', ['code' => $request->code]));
    }

    public function reorder(Request $request)
    {
        $order = Order::where('uni_code', $request->code)->first();
        $cart = Cart::find(ltrim(strstr($order->uni_code, '-'), '-'));

        Cart::create([
            'user_id' => $cart->user_id,
            'subkategori_id' => !is_null($cart->subkategori_id) ? $cart->subkategori_id : null,
            'cluster_id' => !is_null($cart->cluster_id) ? $cart->cluster_id : null,
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
            'total' => $cart->total,
            'file' => $cart->file,
            'link' => $cart->link,
        ]);

        return redirect()->route('user.cart')->with('add', __('lang.alert.reorder-cart',
            ['param' => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name]));
    }
}
