<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\ClusterKategori;
use App\Models\Province;
use App\Models\SubKategori;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function beranda(Request $request)
    {
        $sub = SubKategori::whereIn('id', [1, 31, 28])->orderByRaw('FIELD(id, 1, 31, 28)')->get();
        $clust = ClusterKategori::whereIn('id', [67, 66])->orderByRaw('FIELD(id, 67,66)')->get();
        $sub2 = SubKategori::whereIn('id', [8, 5, 38])->orderByRaw('FIELD(id, 8, 5, 38)')->get();
        $featured = collect(collect($sub)->merge($clust))->merge($sub2);
        $this->array_product($featured);

        \App\Models\Visitor::hit();
        return view('pages.main.beranda', compact('featured'));
    }

    private function array_product($featured)
    {
        foreach ($featured as $x => $row) {
            $thumb = [];
            $gallery = [];
            if ($row->id == 1) {
                for ($i = 1; $i <= 6; $i++) {
                    $thumb[$i] = asset('images/featured/business-card/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/business-card/1.jpg');
                for ($i = 2; $i <= 6; $i++) {
                    $gallery[$i] = asset('images/featured/business-card/' . $i . '.jpg');
                }

            } elseif ($row->id == 31) {
                for ($i = 1; $i <= 4; $i++) {
                    $thumb[$i] = asset('images/featured/brochure/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/brochure/1.jpg');
                for ($i = 2; $i <= 4; $i++) {
                    $gallery[$i] = asset('images/featured/brochure/' . $i . '.jpg');
                }

            } elseif ($row->id == 28) {
                for ($i = 1; $i <= 5; $i++) {
                    $thumb[$i] = asset('images/featured/flyer/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/flyer/1.jpg');
                for ($i = 2; $i <= 5; $i++) {
                    $gallery[$i] = asset('images/featured/flyer/' . $i . '.jpg');
                }

            } elseif ($row->id == 67) {
                for ($i = 1; $i <= 4; $i++) {
                    $thumb[$i] = asset('images/featured/in-banner/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/in-banner/1.jpg');
                for ($i = 2; $i <= 4; $i++) {
                    $gallery[$i] = asset('images/featured/in-banner/' . $i . '.jpg');
                }

            } elseif ($row->id == 66) {
                for ($i = 1; $i <= 2; $i++) {
                    $thumb[$i] = asset('images/featured/tri-banner/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/tri-banner/1.jpg');
                for ($i = 2; $i <= 2; $i++) {
                    $gallery[$i] = asset('images/featured/tri-banner/' . $i . '.jpg');
                }

            } elseif ($row->id == 8) {
                for ($i = 1; $i <= 3; $i++) {
                    $thumb[$i] = asset('images/featured/e-card/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/e-card/1.jpg');
                for ($i = 2; $i <= 3; $i++) {
                    $gallery[$i] = asset('images/featured/e-card/' . $i . '.jpg');
                }

            } elseif ($row->id == 5) {
                for ($i = 1; $i <= 4; $i++) {
                    $thumb[$i] = asset('images/featured/greeting-card/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/greeting-card/1.jpg');
                for ($i = 2; $i <= 4; $i++) {
                    $gallery[$i] = asset('images/featured/greeting-card/' . $i . '.jpg');
                }

            } else {
                for ($i = 1; $i <= 4; $i++) {
                    $thumb[$i] = asset('images/featured/calendar/thumb/' . $i . '.jpg');
                }

                $init = asset('images/featured/calendar/1.jpg');
                for ($i = 2; $i <= 4; $i++) {
                    $gallery[$i] = asset('images/featured/calendar/' . $i . '.jpg');
                }
            }

            $capt = [];
            if (!is_null($row->getCluster)) {
                $capt = $row->getCluster;
                foreach ($capt as $y => $item) {
                    $split = explode(" ", $item->name);
                    $first = current(explode(' ', $item->name));
                    $last = $split[count($split) - 1];

                    $capt[$y] = [
                        'name' => App::getLocale() == 'en' ? $first : $last,
                        'link' => route('produk', ['produk' => $item->permalink])
                    ];
                }
            }

            $featured[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'thumb' => $thumb,
                'init' => $init,
                'gallery' => $gallery,
                'capt' => $capt,
            ];
        }

        return $featured;
    }

    public function produk(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->whereHas('getCluster')->first();
        $clust = ClusterKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->first();
        $provinces = Province::all();
        $guidelines = null;
        $addresses = Address::where('user_id', Auth::id())->orderByDesc('id')->get();

        $cart = $request->has('cart_id') ? Cart::find(decrypt($request->cart_id)) : null;
        $shipping = !is_null($cart) ? Address::find($cart->address_id) : null;

        if (!is_null($sub)) {
            $data = $sub;

            if (count($data->getCluster) > 0) {
                return view('pages.main.produk', compact('data'));

            } else {
                $specs = $data->getSubkatSpecs;
                $guidelines = $data->guidelines;

                return view('pages.main.form-pemesanan', compact('data', 'provinces', 'specs',
                    'guidelines', 'addresses', 'cart', 'shipping'));
            }

        } elseif (!is_null($clust)) {
            $data = $clust;
            $specs = $data->getClusterSpecs;
            $guidelines = $data->getSubKategori->guidelines;

            return view('pages.main.form-pemesanan', compact('data', 'provinces', 'specs',
                'guidelines', 'addresses', 'cart', 'shipping'));
        }

        return back();
    }

    public function submitPemesanan(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->whereHas('getCluster')->first();
        $clust = ClusterKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->first();

        if ($request->hasFile('file')) {
            $this->validate($request, ['file' => 'required|mimes:jpg,jpeg,png,tiff,pdf,zip,rar|max:204800']);
            $file = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/users/order/design/' . Auth::id(), $file);
            $link = null;
        } else {
            $file = null;
            $link = $request->link;
        }

        Cart::create([
            'user_id' => Auth::id(),
            'subkategori_id' => !is_null($sub) ? $sub->id : null,
            'cluster_id' => !is_null($clust) ? $clust->id : null,
            'address_id' => $request->address_id,
            'material_id' => $request->materials,
            'type_id' => $request->type,
            'balance_id' => $request->balance,
            'page_id' => $request->page,
            'copies_id' => $request->copies,
            'size_id' => $request->size,
            'width' => $request->width,
            'length' => $request->length,
            'lamination_id' => $request->lamination,
            'side_id' => $request->side,
            'edge_id' => $request->corner,
            'color_id' => $request->color,
            'finishing_id' => $request->finishing,
            'folding_id' => $request->folding,
            'front_side_id' => $request->front_side,
            'right_side_id' => $request->right_side,
            'left_side_id' => $request->left_side,
            'back_side_id' => $request->back_side,
            'front_cover_id' => $request->front_cover,
            'back_cover_id' => $request->back_cover,
            'binding_id' => $request->binding,
            'print_method_id' => $request->print_method,
            'material_cover_id' => $request->cover_material,
            'side_cover_id' => $request->cover_side,
            'cover_lamination_id' => $request->cover_lamination,
            'lid_id' => $request->lid,
            'orientation_id' => $request->orientation,
            'extra_id' => $request->extra,
            'holder_id' => $request->holder,
            'material_color_id' => $request->material_color,
            'qty' => $request->qty,
            'price_pcs' => $request->price_pcs,
            'production_finished' => $request->production_finished,
            'ongkir' => $request->ongkir,
            'delivery_duration' => $request->delivery_duration,
            'received_date' => $request->received_date,
            'total' => $request->total,
            'file' => $file,
            'link' => $link,
        ]);

        return redirect()->route('beranda')->with('order', __('lang.alert.order',
            ['param' => !is_null($sub) ? $sub->name : $clust->name]));
    }

    public function updatePemesanan(Request $request)
    {
        $cart = Cart::find($request->id);

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

        $cart->update([
            'address_id' => $request->address_id,
            'material_id' => $request->materials,
            'type_id' => $request->type,
            'balance_id' => $request->balance,
            'page_id' => $request->page,
            'copies_id' => $request->copies,
            'size_id' => $request->size,
            'width' => $request->width,
            'length' => $request->length,
            'lamination_id' => $request->lamination,
            'side_id' => $request->side,
            'edge_id' => $request->corner,
            'color_id' => $request->color,
            'finishing_id' => $request->finishing,
            'folding_id' => $request->folding,
            'front_side_id' => $request->front_side,
            'right_side_id' => $request->right_side,
            'left_side_id' => $request->left_side,
            'back_side_id' => $request->back_side,
            'front_cover_id' => $request->front_cover,
            'back_cover_id' => $request->back_cover,
            'binding_id' => $request->binding,
            'print_method_id' => $request->print_method,
            'material_cover_id' => $request->cover_material,
            'side_cover_id' => $request->cover_side,
            'cover_lamination_id' => $request->cover_lamination,
            'lid_id' => $request->lid,
            'orientation_id' => $request->orientation,
            'extra_id' => $request->extra,
            'holder_id' => $request->holder,
            'material_color_id' => $request->material_color,
            'qty' => $request->qty,
            'price_pcs' => $request->price_pcs,
            'production_finished' => $request->production_finished,
            'ongkir' => $request->ongkir,
            'delivery_duration' => $request->delivery_duration,
            'received_date' => $request->received_date,
            'total' => $request->total,
            'file' => $file,
            'link' => $link,
        ]);

        return redirect()->route('beranda')->with('order', __('lang.alert.order-update',
            ['param' => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name]));
    }

    public function deletePemesanan(Request $request)
    {
        $cart = Cart::find(decrypt($request->id));
        if ($cart->file != '') {
            Storage::delete('public/users/order/design/' . Auth::id() . '/' . $cart->file);
        }
        $cart->delete();

        return back()->with('delete', __('lang.alert.cart-delete',
            ['param' => !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name]));
    }

    public function cariNamaProduk(Request $request)
    {
        $sub = SubKategori::where('name->en', 'LIKE', '%' . $request->produk . '%')
            ->orWhere('name->id', 'LIKE', '%' . $request->produk . '%')->get();
        $x = 0;
        foreach ($sub as $row) {
            $sub[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'image' => asset('storage/products/banner/' . $row->banner),
            ];
            $x++;
        }

        $cluster = ClusterKategori::where('name->en', 'LIKE', '%' . $request->produk . '%')
            ->orWhere('name->id', 'LIKE', '%' . $request->produk . '%')->get();
        $y = 0;
        foreach ($cluster as $row) {
            $cluster[$y] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'image' => asset('storage/products/thumb/' . $row->thumbnail),
            ];
            $y++;
        }

        return collect($sub)->merge($cluster);
    }

    public function cekPengirimanProduk(Request $request)
    {
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'Accept' => 'application/json',
                'key' => '7a5350ebe62d80bfc367071ba78ecd84'
            ],
            'defaults' => [
                'exceptions' => false
            ]
        ]);

        try {
            $response = $client->post('https://api.rajaongkir.com/starter/cost', [
                'form_params' => [
                    'origin' => 444,
                    'destination' => $request->destination,
                    'weight' => 2,
                    'courier' => 'jne'
                ]
            ])->getBody()->getContents();

            return json_decode($response, true);

        } catch (ConnectException $e) {
            return response()->json();
        }
    }
}
