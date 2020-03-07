<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function beranda(Request $request)
    {
        return view('pages.main.beranda');
    }
}
