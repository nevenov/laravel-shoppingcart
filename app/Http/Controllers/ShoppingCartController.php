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
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function addToCart($id, ShoppingCart $cart)
    {
        $cart->addToCart(Product::find($id));
        return redirect()->route('cart');
    }
}

