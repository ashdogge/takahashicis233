@extends('layouts.admin')

@section('title', 'Create Products')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @forEach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('admin.products.store')}}">
    @csrf
    <div class="form-group">
        <label for="Product Name">Product Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"></input>
    </div>
    <div class="form-group">
        <label for="Product Price">Price</label>
        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}"></input>
    </div>
    <div class="form-group">
        <label for="Product Description">Description</label>
        <input type="text" class="form-control" name="description" id="description"
            value="{{old('description')}}"></input>
    </div>
    <div class="form-group">
        <label for="Product Description">Item Number</label>
        <input type="number" class="form-control" name="item_number" id="item_number"
            value="{{old('item_number')}}"></input>
    </div>
    <div class="form-group">
        <label for="Product Description">Image URL</label>
        <input type="text" class="form-control" name="image" id="image" value="{{old('image')}}"></input>
    </div>
    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
    <a class="mt-1 btn btn-danger" href="{{route('admin.products.index')}}">Cancel</a>
</form> @endsection