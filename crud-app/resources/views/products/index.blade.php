<!-- Use the layout, pass in title and content -->
@extends('layouts.products')
@section('title', 'All Products')
@section('content')

<!-- Loop through products passed by controller, displaying each-->
<ul class="container-fluid d-flex flex-wrap justify-content-evenly">
    @foreach($products as $product)

        <a class="card link-secondary" href="/products/{{$product->id}}">
            <img class="" width="200" height="200" src="{{$product->image}}">
            <div class="card-body">
                <h5 class=" fw-bolder lead text-center card-title" href="/products/{{$product->id}}">{{$product->name}} ${{$product->price}}</h5>
                <p class="card-text text-center fw-light">Item Number: {{$product->item_number}}</p>
            </div>
        </a>


    @endforeach
</ul>
@endsection