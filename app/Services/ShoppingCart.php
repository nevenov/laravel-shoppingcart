<?php
namespace App\Services;

use App\Product;

class ShoppingCart {

    public function __construct()
    {
        if(!session('cart_data.total_amount'))
            session(['cart_data.total_amount' => 0]);

        if(!session('cart_data.total_price'))
            session(['cart_data.total_price' => 0.00]);
    }

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

            $this->updateCart();
        }
    }

    private function updateCart()
    {
        $total_price = 0;
        $total_amount = 0;

        foreach(session('cart') as $index => $value)
        {
            $total_price += session('cart.'.$index.'.total_price');
            $total_amount += session('cart.'.$index.'.amount');
        }

        session(['cart_data.total_price' => (float) sprintf('%.2f',$total_price)]);
        session(['cart_data.total_amount' => (int) $total_amount]);
    }

    public function removeFromCart($id)
    {
        session()->forget('cart.'.$id);
        $this->updateCart();
    }

    public function deleteCart()
    {
        session()->forget('cart');
        session()->forget('cart_data');
    }

}
