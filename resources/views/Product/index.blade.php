<!-- resources/views/Product/index.blade.php -->
@extends('layouts.app')

@section('title', 'Product Listing')

@section('content')
<div class="container bg-white m-5 p-5">
    <h1 class="mb-4">Product List</h1>

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('product.index') }}" class="mb-4 row g-3">
        <div class="col-md-6">
            <input type="text" class="form-control" name="search" placeholder="Search by name" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('product.index') }}" class="btn btn-secondary w-100">Clear</a>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="low_stock" {{ request('low_stock') ? 'checked' : '' }}>
                <label class="form-check-label">Low Stock (Quantity < 10)</label>
            </div>
        </div>
    </form>

    <!-- Products Table -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('product.show', $product) }}" class="btn btn-info btn-sm">View</a>
                        @can('update', $product) <!-- Check if user can edit -->
                            <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        @can('delete', $product) <!-- Check if user can delete -->
                            <form action="{{ route('product.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-end px-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    <!-- Add New Product Button -->
    @can('create', App\Models\Product::class) <!-- Check if user can create -->
        <div class="mt-4">
            <a href="{{ route('product.create') }}" class="btn btn-success">Add New Product</a>
            <a href="{{ route('csvDownload') }}" class="btn btn-info">Download Product File</a>
        </div>
    @endcan
</div>
@endsection

<style>
.pagination {
    justify-content: center;
    margin-top: 7.5px; 
    margin-left: 10px;     
}

.pagination .page-link {
    margin: 0 5px;        
}
</style>
