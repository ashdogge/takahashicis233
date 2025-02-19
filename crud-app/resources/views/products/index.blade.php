<!-- Use the layout, pass in title and content -->
@extends('layouts.products')
@section('title', 'All Products')
@section('content')
    <!-- Check if user can search, display if true -->
    @can('search', App\Models\Product::class)
        <form class="container-fluid d-flex" action="{{ route('products.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
            <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
        </form>
    @endcan
    @can('paginate', App\Models\Product::class)
        <!-- Pagination links -->
        <div class="d-flex flex-row justify-content-center align-items-center">
            <p class="">{{ $products->links() }}</p>
        </div>
    @endcan
    <!-- Loop through products passed by controller, displaying each-->
    <ul class="container-fluid d-flex flex-wrap justify-content-evenly">
        @foreach($products as $product)

            <a class="card link-secondary" href="/products/{{$product->id}}">
                <img class="" width="200" height="200" src="{{$product->image}}">
                <div class="card-body">
                    <h5 class=" fw-bolder lead text-center card-title" href="/products/{{$product->id}}">{{$product->name}}
                        ${{$product->price}}</h5>
                    <p class="card-text text-center fw-light">Item Number: {{$product->item_number}}</p>
                </div>
            </a>


        @endforeach
    </ul>
    <div class="container-fluid d-flex justify-content-center">
        <a class="mt-1 btn btn-danger" href="{{route('admin.products.index')}}">Admin Zone</a>
    </div>
@endsection