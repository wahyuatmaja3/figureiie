<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figure;

class WebController extends Controller
{
    public function index() {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-neihfbMt_4BwId9C8-93treI';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details' => array(
                [
                    'id' => 'a1',
                    'price' => '20000',
                    'quantity' => '2',
                    'name' => 'Tomat'
                ]
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('main', [
            'figures' => Figure::orderBy('created_at', 'desc')->take(8)->get(),
            'snap_token' => $snapToken
        ]);
    }
}
