@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')

@include('admin.products.errors')

<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf
    @include('admin.products.form')

    <button type="submit" class="btn btn-primary mt-1">Submit</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-danger mt-1">Cancel</a>
</form>
@endsection