@extends('layout')

@section('content')
    @foreach($products->chunk(3) as $chunk)
        <div class="card-deck">
            @foreach($chunk as $product)
                <div class="card" style="width: 18rem;">
                    <img src="{{$product->url256}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$product->name}} {{$product->subname}} <strong>${{$product->price}}</strong></h5>
                        <p class="card-text">{{$product->description}}</p>
                        <a href="{{route('add-to-cart',$product->id)}}" class="btn btn-warning">Add to cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection