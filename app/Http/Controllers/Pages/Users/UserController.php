<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
