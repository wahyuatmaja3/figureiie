<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\ValidatedData;

class CheckoutController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect('/checkout/information');
        } else {
            return redirect('/user/login');
        }
    }

    public function information(Request $request) {
        return view('cart.information', [
            "step" => "Information",
            "cart" => Cart::content()
        ]);
    }
    
    public function storeInformation(Request $request) {
        $validatedData = $request->validate([
            "fname" => "required",
            "lname" => "required",
            "address" => "required",
            "label" => "required",
            "phone" => "required"
        ]);

        session(['information' => $validatedData]);

        return redirect('/checkout/shipping');
    }

    public function shipping(Request $request) {
        return view('cart.shipping', [
            'step' => "Shipping",
            "cart" => Cart::content(),
            "shippings" => ShippingMethod::all()
        ]);
    }

    public function storeShipping(Request $request) {
        $validatedData = $request->validate([
            "shipping" => "required"
        ]);

        session(['shipping' => $validatedData]);

        return redirect('/checkout/payment');

    }

    public function payment(Request $request) {

        // dd(session('information'));

        $cust_information = session('information');
        $cart = Cart::content();
        $cartItems= array();
        

        foreach (Cart::content() as $key => $item) {
            // if(!isset($cartItems[$item['name']])) {
            //     $cartItems[$item['ame']] = $item;
            // } else {
            //     //do if needed
            // }
            $itemDet = [
                'id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'name' => $item->name
            ];
            $cartItems[] = $itemDet;
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
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
            'item_details' => $cartItems,
            'customer_details' => array(
                'first_name' => $cust_information['fname'],
                'last_name' => $cust_information['lname'],
                'email' => Auth::user()->email,
                'phone' => $cust_information['phone'],
            ),
            'billing_address' => array(
                'first_name' => $cust_information['fname'],
                'last_name' => $cust_information['lname'],
                'address'      => $cust_information['address'],
                'city'         => "",
                'postal_code'  => "",
                'phone'        => $cust_information['phone'],
                'country_code' => 'IDN'
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);


        return view('cart.payment', [
            "step" => "Payment",
            "cart" => Cart::content(),
            "shipping" => ShippingMethod::find(session('shipping')['shipping']),
            "snap_token" => $snapToken
        ]);
    }

    public function paymentPost(Request $request) {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = $json->transaction_status;
        $order->uname = auth()->user()->username;
        $order->email = auth()->user()->email;
        $order->phone = auth()->user()->phone;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;

        // $totalPrice = (int)str_replace(".00", "", $json->gross_amount);
        // $shipPrice = ShippingMethod::find(session('shipping')['shipping'])->price;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null ;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null ;
        // dd($json->transaction_status);
        return $order->save()
            ? redirect(url('/'))->with('order-success', 'order berhasil dibuat')
            : redirect(url('/'))->with('order-failed', 'terjadi kesalahan');
    }
}
