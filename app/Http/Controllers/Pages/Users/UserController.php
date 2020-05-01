<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\PaymentCart;
use App\Support\StatusProgress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $bio = $user->getBio;

        $archive = Cart::where('user_id', $user->id)->where('isCheckout', false)
            ->orderByDesc('address_id')->get()->groupBy(function ($q) {
                return Carbon::parse($q->created_at)->formatLocalized('%B %Y');
            });
        $carts = $archive;

        $a = 1;
        $b = 1;
        $c = 1;
        $d = 1;
        $e = 1;
        $subtotal = 0;
        $ongkir = 0;

        return view('pages.main.users.cart', compact('user', 'bio', 'carts',
            'a', 'b', 'c', 'd', 'e', 'subtotal', 'ongkir'));
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
        $discount = 10;
        $total = $request->total - ($request->total * $discount / 100);

        if ($request->kode == 'versapremier') {
            return [
                'discount' => $discount, 'total' => $total,
                'str_total' => 'Rp' . number_format($total, 2, ',', '.')
            ];
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

        $archive_unpaid = PaymentCart::where('user_id', $user->id)->where('finish_payment', false)
            ->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)->where('isCheckout', true)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id)->where('isCheckout', true);
                    })->where('user_id', $user->id)->where('finish_payment', false);
            })->orderByDesc('id')->get()->groupBy('uni_code_payment');
        $unpaid = $archive_unpaid;

        $archive_paid = PaymentCart::where('user_id', $user->id)->where('finish_payment', true)
            ->when($keyword, function ($q) use ($keyword, $user) {
                $q->where('uni_code_payment', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('getCart', function ($q) use ($keyword, $user) {
                        $q->whereHas('getSubKategori', function ($q) use ($keyword) {
                            $q->where('name', 'LIKE', '%' . $keyword . '%');
                        })->where('user_id', $user->id)->where('isCheckout', true)
                            ->orWhereHas('getCluster', function ($q) use ($keyword) {
                                $q->where('name', 'LIKE', '%' . $keyword . '%');
                            })->where('user_id', $user->id)->where('isCheckout', true);
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
}
