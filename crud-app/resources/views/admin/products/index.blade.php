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

<table class="container-fluid">
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

            <td class="lead fw-light "><a class="link-dark"
                    href="{{route('admin.products.show', $product)}}">{{$product->name}}</a>
            </td>
            <td class="lead fw-light link-dark"><a class="link-dark"
                    href="{{route('admin.products.show', $product)}}">{{$product->item_number}}</a></td>

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
@endsection