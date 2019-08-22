@extends('layout')

@section('content')
    <div class="col-md-4 mt-4">
        <div class="row">
            <form method="POST" action="?action=create-payment">
                <input type="image" name="submit_red" alt="Check out with PayPal" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png">
            </form>
        </div>
    </div>
    <div class="col-md-4 mt-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">4</span>
        </h4>
        <ul class="list-group mb-3">

            @foreach($cart_products as $product)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$product['name']}} {{$product['subname']}}</h6>
                        <small class="text-muted">Amount: {{$product['amount']}}</small>
                    </div>
                    <span class="text-muted">${{$product['price']}}</span>
                </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$2901</strong>
            </li>
        </ul>
    </div>
@endsection
