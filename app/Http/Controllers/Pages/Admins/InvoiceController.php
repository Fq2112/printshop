<?php

namespace App\Http\Controllers\Pages\Admins;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\PaymentCart;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $data = PaymentCart::distinct('uni_code_payment')->select('uni_code_payment', 'user_id', 'updated_at')->get();

        if ($request->has("id")) {
            $findMessage = $request->id;
        } else {
            $findMessage = null;
        }

        return view('pages.main.admins.invvoice', [
            'contacts' => $data,
            'findMessage' => $findMessage
        ]);
    }

    public function getDataInvoice(Request $request)
    {
        try {
            $data = PaymentCart::where('uni_code_payment', $request->uni_code)->distinct('uni_code_payment')
                ->select('uni_code_payment', 'user_id', 'updated_at')->first();
            $dataPayment = PaymentCart::where('uni_code_payment', $request->uni_code)->get();
            return view('pages.main.admins._partials.invoice',[
                'head' => $data,
                'data' => $dataPayment
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception], 500);
        }
    }
}
