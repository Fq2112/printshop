<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\Users\ClaimOfferMail;
use App\Models\Cart;
use App\Models\Clients;
use App\Models\ClusterKategori;
use App\Models\PriceTier;
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
        $clients = Clients::orderBy('name')->get();
        $sub = SubKategori::where('is_featured', true)->where('isActive', true)->get();
        $clust = ClusterKategori::where('is_featured', true)->where('isActive', true)->get();
        $featured = collect($sub)->merge($clust)->sortBy('name');
        $this->array_product($featured);

        \App\Models\Visitor::hit();
        return view('pages.main.beranda', compact('featured', 'clients'));
    }

    private function array_product($featured)
    {
        foreach ($featured as $x => $row) {
            $thumb = [];
            $capt = [];

            if(!is_null($row->kategoris_id)) { // if subkat
                $capt = $row->getCluster;
                if (count($capt) > 0) { // if has cluster
                    foreach ($capt as $y => $item) {
                        $split = explode(" ", $item->name);
                        $first = current(explode(' ', $item->name));
                        $last = $split[count($split) - 1];
                        $capt[$y] = [
                            'name' => App::getLocale() == 'en' ? $first : $last,
                            'link' => route('produk', ['produk' => $item->permalink])
                        ];

                        $thumb[$y] = asset('storage/products/thumb/'.$item->thumbnail);
                    }
                } else { // if doesnt have cluster
                    $gallery = $row->getGallery;
                    foreach ($gallery as $y => $item) {
                        $thumb[$y] = asset('storage/products/gallery/'.$item->image);
                    }
                }
            } else { // if cluster
                foreach ($row->getGallery as $y => $item) {
                    $thumb[$y] = asset('storage/products/gallery/'.$item->image);
                }
            }

            $featured[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'thumb' => $thumb,
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
                    $typeTier = $specs->get_type;
                    if($typeTier) {
                        $tiers = PriceTier::where('type_id', $typeTier->id)->orderBy('start')->get();
                        $last_tier = PriceTier::where('type_id', $typeTier->id)->orderByDesc('end')->first();
                        $gallery = $data->getGallery;
                        $guidelines = $data->guidelines;

                        return view('pages.main.form-pemesanan', compact('clust', 'data',
                            'specs', 'typeTier', 'tiers', 'last_tier', 'guidelines', 'cart', 'gallery'));
                    }
                }
            }

        } elseif (!is_null($clust)) {
            $data = $clust;
            $specs = $data->getClusterSpecs;
            if ($specs) {
                $typeTier = $specs->get_type;
                if($typeTier) {
                    $tiers = PriceTier::where('type_id', $typeTier->id)->orderBy('start')->get();
                    $last_tier = PriceTier::where('type_id', $typeTier->id)->orderByDesc('end')->first();
                    $gallery = $data->getGallery;
                    $guidelines = $data->getSubKategori->guidelines;

                    return view('pages.main.form-pemesanan', compact('clust', 'data',
                        'specs', 'typeTier', 'tiers', 'last_tier', 'guidelines', 'cart', 'gallery'));
                }
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
