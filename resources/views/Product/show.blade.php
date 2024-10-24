<!-- resources/views/Product/show.blade.php -->
@extends('layouts.app')

@section('title', 'View Product')

@section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card shadow" style="border-radius: 1rem;">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h3 class="mb-4">View Product</h3>
                </div>
                <div class="card-body p-4">
                    <div class="form-group mb-3 row">
                        <label for="name" class="col-sm-4 col-form-label">Product Name:</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">{{ $product->name }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="sku" class="col-sm-4 col-form-label">SKU:</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">{{ $product->sku }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="quantity" class="col-sm-4 col-form-label">Quantity:</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">{{ $product->quantity }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="price" class="col-sm-4 col-form-label">Price:</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <label for="description" class="col-sm-4 col-form-label">Description:</label>
                        <div class="col-sm-8">
                            <p class="form-control-plaintext">{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-md">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
