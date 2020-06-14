<?php

namespace App\Http\Controllers\Pages\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Balance;
use Xendit\Xendit;

class PaymentController extends Controller
{
    public $server_domain, $secret_api_key;

    function __construct()
    {
        $this->server_domain = 'https://api.xendit.co';
        $this->secret_api_key = env('XENDIT_SECRET');
    }

    public function getChannels()
    {
        Xendit::setApiKey($this->secret_api_key);
        $createInvoice = \Xendit\Invoice::create([
            'external_id' => 'demo_147580196270',
            'payer_email' => 'sample_email@xendit.co',
            'description' => 'Trip to Bali',
            'amount' => 32000
        ]);
        dd($createInvoice);

        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.xendit.co/payment_channels', [
            'auth' => [env('XENDIT_SECRET'), null]
        ]);
        dd($response);
    }
}
