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
        return view('cart', compact('cart_products'));
    }

    public function addToCart($id, ShoppingCart $cart)
    {
        $cart->addToCart(Product::find($id));
        return redirect()->route('cart');
    }

    public function checkout()
    {
        $cart_products = session('cart') ?? [];
        return view('checkout',compact('cart_products'));
    }

}

