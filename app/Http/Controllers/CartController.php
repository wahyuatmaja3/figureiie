<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Figure;

class CartController extends Controller
{
    public function index() {
        return view('cart.cart', [
            'cart' => Cart::content()
        ]);
    }

    public function store(Request $request) {
        $product = Figure::findOrFail($request->idFigure);
        $cart = Cart::content();
        $isAdded = $cart->where('id', $product->id);
        if ($cart->where('id', $product->id)->count()) {
            Cart::update($isAdded->first()->rowId, $request->qty);
        } else {

            Cart::add($product->id, $product->name, $request->qty, $product->price, 0, ['img' => $request->img, 'slug' => $product->slug]);
        }

        return redirect('/figures/' . $product->slug)->with('successAdd', 'Product has been added to cart!');
    }

    public function remove(Request $request) {
        Cart::remove($request->rowId);

        return redirect('/cart');
    }
}
