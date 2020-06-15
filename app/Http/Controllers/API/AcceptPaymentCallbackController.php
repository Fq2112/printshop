<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcceptPaymentCallbackController extends Controller
{
    public function getCallback(Request $request)
    {
        dd($request->all());
    }
}
