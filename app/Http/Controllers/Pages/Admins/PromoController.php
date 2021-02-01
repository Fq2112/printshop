<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function show_promo()
    {
        $data = PromoCode::all();

        return view('pages.main.admins.promo', [
            'title' => 'Promo '.env('APP_NAME').' List',
            'kategori' => $data
        ]);
    }

    public function create_data(Request $request)
    {
        $check = PromoCode::where('promo_code', $request->promo_code)->first();

        if (empty($check)) {
            PromoCode::create([
                'promo_code' => $request->promo_code,
                'start' => Carbon::parse($request->start),
                'end' => Carbon::parse($request->end),
                'description' => $request->description,
                'discount' => $request->discount,
            ]);
            return back()->with('success', 'Promo ['.$request->promo_code.'] is successfully created!');

        } else {
            return back()->with('error', 'Promo Code already taken please use another name');
        }
    }

    public function ger_data($id)
    {
        $data = PromoCode::find($id);
        return $data;
    }

    public function update_data(Request $request)
    {
        $promo = PromoCode::find($request->id);
        $promo->update([
            'promo_code' => $request->promo_code,
            'start' => Carbon::parse($request->start),
            'end' => Carbon::parse($request->end),
            'description' => $request->description,
            'discount' => $request->discount,
        ]);

        return back()->with('success', 'Promo ['.$promo->promo_code.'] is successfully updated!');
    }

    public function delete_data($id)
    {
        $promo = PromoCode::find(decrypt($id));
        $promo->delete();

        return back()->with('success', 'Promo ['.$promo->promo_code.'] is successfully deleted!');
    }
}
