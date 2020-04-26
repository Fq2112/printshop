<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $bio = $user->getBio;

        $archive = Cart::where('user_id', $user->id)->orderByDesc('address_id')->get()->groupBy(function ($q) {
            return Carbon::parse($q->created_at)->formatLocalized('%B %Y');
        });

        $carts = $archive;
        $a = 1;
        $b = 1;
        $c = 1;
        $d = 1;
        $e = 1;
        $f = 1;
        $subtotal = 0;
        $ongkir = 0;

        return view('pages.main.users.cart', compact('user', 'bio', 'archive',
            'carts', 'a', 'b', 'c', 'd', 'e', 'f', 'subtotal', 'ongkir'));
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
        $address = Address::where('user_id', $user->id)->where('is_main', true)->first();
        $keyword = $request->q;
        $category = $request->filter;

        return view('pages.main.users.dashboard', compact('user', 'bio', 'address', 'keyword', 'category'));
    }
}
