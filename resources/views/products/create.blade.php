@extends('layout')

@section('title', 'Add New Product')

@section('content')
<h1>Add New Product</h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="product_id" class="form-label">Product ID</label>
        <input type="text" class="form-control" id="product_id" name="product_id" value="{{ old('product_id') }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
@endsection
