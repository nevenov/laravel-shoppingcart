<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>E-commerce shopping cart</title>
</head>

<body>
<div class="mt-5 container">
    @guest
        <span class="float-right">&nbsp;You are not logged in <a href="{{route('login')}}">login</a> </span>
    @else
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        <span class="float-right">&nbsp;You are logged in as {{Auth::user()->name}} <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a> </span>
    @endguest
    <span class="float-right"><a href="{{route('cart')}}">Your cart ({{session('cart_data.total_amount') ?? 0}})</a> </span>
    <h1><span class="text-info">SUPER</span> <span class="text-danger">SHOP</span></h1>
    <p class="text-success">The best online store</p>
    <hr>
    <div class="row">
        @yield('content')
    </div>
</div>
</body>

</html>
