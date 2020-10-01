<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\Users\ClaimOfferMail;
use App\Models\Cart;
use App\Models\ClusterKategori;
use App\Models\PromoCode;
use App\Models\Setting;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
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

    public function switchLang(Request $request)
    {
        $visitor = \App\Models\Visitor::where('ip', $_SERVER['REMOTE_ADDR'])->where('date', date('Y-m-d'))->first();
        $visitor->update(['lang' => $request->lang]);

        return redirect()->to($request->locale_url);
    }

    public function claimOffer(Request $request)
    {
        $email = $request->claim_email;
        $promo = PromoCode::where('promo_code', $request->promo_code)->first();
        Mail::to($email)->send(new ClaimOfferMail($email, $promo));

        return back()->with('claim', __('lang.alert.claim-offer'));
    }

    public function produk(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)->where('isActive', true)
            ->whereHas('getKategori', function ($q) {
                $q->where('isActive', true);
            })->orwhere('permalink->id', $request->produk)->where('isActive', true)
            ->whereHas('getKategori', function ($q) {
                $q->where('isActive', true);
            })->first();

        $clust = ClusterKategori::where('permalink->en', $request->produk)->where('isActive', true)
            ->whereHas('getSubKategori', function ($q) {
                $q->where('isActive', true)->whereHas('getKategori', function ($q) {
                    $q->where('isActive', true);
                });
            })->orwhere('permalink->id', $request->produk)->where('isActive', true)
            ->whereHas('getSubKategori', function ($q) {
                $q->where('isActive', true)->whereHas('getKategori', function ($q) {
                    $q->where('isActive', true);
                });
            })->first();

        $guidelines = null;
        $cart = $request->has('cart_id') ? Cart::find(decrypt($request->cart_id)) : null;

        if (!is_null($sub)) {
            $data = $sub;
            $clusters = ClusterKategori::where('subkategori_id', $data->id)->where('isActive', true)->get();

            if (count($clusters) > 0) {
                return view('pages.main.produk', compact('data', 'clusters'));

            } else {
                $specs = $data->getSubkatSpecs;
                if ($specs) {
                    $guidelines = $data->guidelines;
                    $setting = Setting::first();
                    $gallery = $data->getGallery;

                    return view('pages.main.form-pemesanan', compact('clust', 'data', 'specs',
                        'guidelines', 'cart', 'setting', 'gallery'));
                }
            }

        } elseif (!is_null($clust)) {
            $data = $clust;
            $specs = $data->getClusterSpecs;
            if ($specs) {
                $guidelines = $data->getSubKategori->guidelines;
                $setting = Setting::first();
                $gallery = $data->getGallery;

                return view('pages.main.form-pemesanan', compact('clust', 'data', 'specs',
                    'guidelines', 'cart', 'setting', 'gallery'));
            }
        }

        return redirect()->route('beranda');
    }

    public function downloadGuidelines(Request $request)
    {
        $file_path = storage_path('app/public/products/guidelines/' . $request->file);
        if (file_exists($file_path)) {
            return Response::download($file_path, $request->file, [
                'Content-Length: ' . filesize($file_path)
            ]);
        } else {
            return 0;
        }
    }

    public function submitPemesanan(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->first();
        $clust = ClusterKategori::where('permalink->en', $request->produk)
            ->orwhere('permalink->id', $request->produk)->first();

        if ($request->hasFile('file')) {
            $this->validate($request, ['file' => 'required|mimes:jpg,jpeg,png,tiff,pdf,zip,rar|max:204800']);
            $ext = $request->file('file')->getClientOriginalExtension();
            $file = 'design-' . strtolower(str_replace(' ', '-', !is_null($sub) ? $sub->name : $clust->name)) . '.' . $ext;
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
            $ext = $request->file('file')->getClientOriginalExtension();
            $file = 'design-' . strtolower(str_replace(' ', '-', !is_null($cart->subkategori_id) ? $cart->getSubKategori->name : $cart->getCluster->name)) . '.' . $ext;
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
        $sub = SubKategori::where('name', 'LIKE', '%' . $request->produk . '%')->get();
        $x = 0;
        foreach ($sub as $row) {
            $sub[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'image' => asset('storage/products/banner/' . $row->banner),
            ];
            $x++;
        }

        $cluster = ClusterKategori::where('name', 'LIKE', '%' . $request->produk . '%')->get();
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
}
