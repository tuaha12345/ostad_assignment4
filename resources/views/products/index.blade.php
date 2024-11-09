@extends('layout')

@section('title', 'All Products')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>All Products</h1>
    <form class="d-flex" method="GET" action="{{ route('products.index') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Search by ID or Description" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="{{ route('products.index', ['sort_by' => 'product_id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Product ID</a></th>
            <th><a href="{{ route('products.index', ['sort_by' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Name</a></th>
            <th>Description</th>
            <th><a href="{{ route('products.index', ['sort_by' => 'price', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">Price</a></th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock ?? 'N/A' }}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50" >
                @else
                N/A
                @endif
            </td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No products found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $products->appends(request()->query())->links() }}
</div>
@endsection
