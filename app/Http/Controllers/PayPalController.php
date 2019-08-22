<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayPalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPayment()
    {
        if( !session('cart') || empty(session('cart')) || session('cart_data.total_price') == 0 )
            return redirect()->route('products');

        return 'create payment';
    }
}

