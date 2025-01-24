
<!-- Use the layout, pass in title and content -->
@extends("layouts.products")
@section("title", 'Fruit')
@section("content")
<h1 class="display-1 text-center fw-bold">{{$product->name}}</h1>
<div class="d-flex flex-fill justify-content-center">

    <div class="card" style= "width:20%">
    <img src="{{$product->image}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h4 class="card-title text-center">{{$product->name}} ${{$product->price}}</h4>
        <p class="card-text text-center fw-light">{{$product->description}}</p>
    </div>
    </div>
</div>


@endsection