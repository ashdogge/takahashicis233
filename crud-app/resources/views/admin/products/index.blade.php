<!-- Use the layout, pass in title and content -->
@extends('layouts.admin')
@section('title', 'Admin Products')
@section('content')
<!-- Control buttons div -->
<div class="container-fluid d-flex flex-wrap justify-content-evenly m-1">
    <a class="btn btn-primary" href="{{route('admin.products.create')}}">
        Create Product
    </a>
</div>

<ul class="container-fluid d-flex flex-wrap justify-content-evenly">
    <!-- Loop through products passed by controller, displaying each-->

    @foreach($products as $product)

        <a class="card link-secondary" href="/admin/products/{{$product->id}}">
            <img class="" width="200" height="200" src="{{$product->image}}">
            <div class="card-body">
                <h5 class=" fw-bolder lead text-center card-title" href="/admin/products/{{$product->id}}">
                    {{$product->name}} ${{$product->price}}
                </h5>
                <p class="card-text text-center fw-light">Item Number: {{$product->item_number}}</p>
            </div>
        </a>


    @endforeach
</ul>
@endsection