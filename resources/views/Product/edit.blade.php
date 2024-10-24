<!-- resources/views/Product/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h3 class="mb-4">Edit Product</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Product Form -->
                    <form action="{{ route('product.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Product Name:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="sku" class="col-sm-4 col-form-label">SKU:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="quantity" class="col-sm-4 col-form-label">Quantity:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="price" class="col-sm-4 col-form-label">Price:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <label for="description" class="col-sm-4 col-form-label">Description:</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-3 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-md">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
