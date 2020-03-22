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

    public function syaratKetentuan()
    {
        return 'syarat dan ketentuan';
    }

    public function kebijakanPrivasi()
    {
        return 'kebijakan privasi';
    }
}
