<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPal;

class PayPalController extends Controller
{

    public function __construct(PayPal $pp)
    {
        $this->pp = $pp;
        $this->middleware('auth');
    }

    public function createPayment()
    {
        if( !session('cart') || empty(session('cart')) || session('cart_data.total_price') == 0 )
            return redirect()->route('products');

        return redirect($this->pp->createPayment());
    }

    public function executePayment()
    {
        $this->pp->executePayment();
        return redirect()->route('products');
    }
}

