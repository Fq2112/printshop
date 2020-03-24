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
        \App\Models\Visitor::hit();
        return view('pages.main.beranda');
    }

    public function produk(Request $request)
    {
        $sub = SubKategori::where('permalink->en', $request->produk)->orwhere('permalink->id', $request->produk)->first();
        $clust = ClusterKategori::where('permalink->en', $request->produk)->orwhere('permalink->id', $request->produk)->first();

        if ($sub) {
            return $sub;
        } else {
            return $clust;
        }
    }

    public function cariNamaProduk(Request $request)
    {
        $sub = SubKategori::where('name->en', 'LIKE', '%' . $request->produk . '%')
            ->orWhere('name->id', 'LIKE', '%' . $request->produk . '%')->get();
        $x = 0;
        foreach ($sub as $row) {
            $sub[$x] = [
                'name' => $row->name,
                'link' => route('produk', ['produk' => $row->permalink, 'lang' => App::getLocale()]),
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
                'link' => route('produk', ['produk' => $row->permalink, 'lang' => App::getLocale()]),
                'image' => asset('storage/products/thumb/' . $row->getSubKategori->getKategori->image),
            ];
            $y++;
        }

        return collect($sub)->merge($cluster);
    }

    public function pro()
    {
        \App\Models\Visitor::hit();
        return __('lang.header.pro');
    }

    public function caraPemesanan()
    {
        \App\Models\Visitor::hit();
        return __('lang.header.how-to');
    }

    public function faq()
    {
        \App\Models\Visitor::hit();
        return __('lang.header.faq');
    }

    public function tentang()
    {
        \App\Models\Visitor::hit();
        return __('lang.header.about');
    }

    public function kontak()
    {
        \App\Models\Visitor::hit();
        return __('lang.header.contact');
    }

    public function syaratKetentuan()
    {
        \App\Models\Visitor::hit();
        return __('lang.footer.tnc');
    }

    public function kebijakanPrivasi()
    {
        \App\Models\Visitor::hit();
        return __('lang.footer.pp');
    }
}
