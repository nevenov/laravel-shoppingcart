<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Services\ShoppingCart;

class ShoppingCartController extends Controller
{

    public function products(Product $product)
    {
        // dd(session()->all());
        $products = $product::all();
        return view('products',compact('products'));
    }

    public function cart()
    {
        $cart_products = session('cart') ?? [];
        $total_price = session('cart_data.total_price') ?? 0;
        return view('cart', compact('cart_products', 'total_price'));
    }

    public function addToCart($id, ShoppingCart $cart)
    {
        $cart->addToCart(Product::find($id));
        return redirect()->route('cart');
    }

    public function removeFromCart($id, ShoppingCart $cart)
    {
        $cart->removeFromCart($id);
        return redirect()->route('cart');
    }

    public function updateQuantities(Request $request, ShoppingCart $cart)
    {
        if($request->input('amounts'))
            $cart->updateQuantities($request);
        return redirect()->route('cart');
    }

    public function checkout()
    {
        $cart_products = session('cart') ?? [];
        $total_price = session('cart_data.total_price') ?? 0;
        $total_amount = session('cart_data.total_amount') ?? 0;
        return view('checkout',compact('cart_products','total_price','total_amount'));
    }

}

