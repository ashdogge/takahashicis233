@extends('layouts.admin')
@section('title', 'Admin Products')
@section('content')
    <!-- Control buttons div -->
    <div class="container-fluid d-flex flex-wrap justify-content-evenly m-1">
        <a class="btn btn-primary" href="{{route('admin.products.create')}}">
            Create Product
        </a>
    </div>

    <form class="container-fluid d-flex" action="{{ route('admin.products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
        <a class="btn btn-secondary" href="{{ route('admin.products.index') }}">Cancel</a>
    </form>
    <!-- Pagination links + searchbar -->
    <div class="d-flex flex-row justify-content-center align-items-center">
        <p class="">{{ $products->links() }}</p>
    </div>

    <!-- Table -->
    <div class="table-container d-flex justify-content-center">
        <table class="container-fluid table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Item Number</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <!-- Loop through products passed by controller, displaying each-->
            @foreach($products as $product)
                <tr>
                    <td class="lead fw-light">
                        <a class="link-dark" href="{{route('admin.products.show', $product)}}">
                            {{$product->name}}
                        </a>
                    </td>
                    <td class="lead fw-light link-dark">
                        <a class="link-dark" href="{{route('admin.products.show', $product)}}">
                            {{$product->item_number}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form class="d-inline" action="{{route('admin.products.destroy', $product)}}" method="POST"
                            onSubmit="return confirm('Are you sure you want to delete?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection