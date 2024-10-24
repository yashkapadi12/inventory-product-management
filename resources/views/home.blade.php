<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class=" d-flex flex-column justify-content-center mx-5 p-5 align-items-center text-center text-white bg-dark bg-opacity-50">        
        <div class="container position-relative z-index-1">
            <h1 class="display-4 fw-bold">Welcome to the Inventory Management System</h1>
            <p class="lead mb-4">Manage your products effectively and efficiently. Track your inventory, view stock levels, and ensure you never run out of essential items.</p>
            <p class="mb-4">Whether you are a small business or a large enterprise, our system is designed to fit your needs and help you streamline your operations.</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>
@endsection
