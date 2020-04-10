<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\ClusterKategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function cariNamaProduk(Request $request)
    {
        $sub = SubKategori::where('name->en', 'LIKE', '%' . $request->produk . '%')
            ->orWhere('name->id', 'LIKE', '%' . $request->produk . '%')->get();
        $x = 0;
        foreach ($sub as $row) {
            $sub[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink]),
                'image' => asset('storage/products/thumb/' . $row->getKategori->image),
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
                'image' => asset('storage/products/thumb/' . $row->getSubKategori->getKategori->image),
            ];
            $y++;
        }

        return collect($sub)->merge($cluster);
    }

    public function produk(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)->orwhere('permalink->id', $request->produk)
            ->whereHas('getCluster')->first();
        $clust = ClusterKategori::where('permalink->en', $request->produk)->orwhere('permalink->id', $request->produk)->first();

        if ($sub) {
            return view('pages.main.produk', compact('sub'));
        } else {
            return view('pages.main.form-pemesanan', compact('clust'));
        }
    }
}
