@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.products.update', $product->id) }}">
    @csrf
    @method('PUT')
    @include('admin.products.form')

    <button type="submit" class="mt-1 btn btn-primary">Save Changes</button>
    <a class="mt-1 btn btn-danger" href="{{ route('admin.products.index') }}">Cancel</a>
</form>

@endsection