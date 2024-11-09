@extends('layout')

@section('title', 'Product Details')

@section('content')
<h1>Product Details</h1>
<div class="card">
    <div class="card-header">
        {{ $product->name }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Product ID: {{ $product->product_id }}</h5>
        <p class="card-text">Description: {{ $product->description ?? 'N/A' }}</p>
        <p class="card-text">Price: ${{ number_format($product->price, 2) }}</p>
        <p class="card-text">Stock: {{ $product->stock ?? 'N/A' }}</p>
        @if($product->image)
        <p class="card-text">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="150">
        </p>
        @endif
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to All Products</a>
@endsection
