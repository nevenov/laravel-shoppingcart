<?php
namespace App\Services;

use App\Product;

class ShoppingCart {

    public function addToCart(Product $product)
    {
        if(!session('cart.'.$product->id))
        {
            session(['cart.'.$product->id.'.id' => $product->id]);
            session(['cart.'.$product->id.'.name' => $product->name]);
            session(['cart.'.$product->id.'.subname' => $product->subname]);
            session(['cart.'.$product->id.'.url72' => $product->url72]);
            session(['cart.'.$product->id.'.price' => (float) $product->price]);
            session(['cart.'.$product->id.'.amount' => 1]);
            session(['cart.'.$product->id.'.total_price' => session('cart.'.$product->id.'.price')]);
        }
    }

}
