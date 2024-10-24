<!-- resources/views/Product/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card shadow" style="border-radius: 1rem;">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <h3 class="mb-4">Create Product</h3>
                    </div>
                    <div class="card-body p-4">

                        <!-- Create Product Form -->
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="name" required class="form-control" value="{{ old('name') }}" placeholder="Enter product name">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="sku" class="col-sm-4 col-form-label">SKU:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sku" id="sku" required class="form-control" value="{{ old('sku') }}" placeholder="Enter SKU">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="quantity" class="col-sm-4 col-form-label">Quantity:</label>
                                <div class="col-sm-8">
                                    <input type="number" name="quantity" id="quantity" required class="form-control" value="{{ old('quantity') }}" placeholder="Enter quantity">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="price" class="col-sm-4 col-form-label">Price:</label>
                                <div class="col-sm-8">
                                    <input type="number" name="price" id="price" required class="form-control" value="{{ old('price') }}" step="0.01" placeholder="Enter price">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label for="description" class="col-sm-4 col-form-label">Description:</label>
                                <div class="col-sm-8">
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-3 mt-5">
                                <button class="btn btn-primary btn-lg" type="submit">Create Product</button>
                            </div>

                        </form>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-md">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
