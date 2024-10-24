<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Inventory Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dashboardDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dashboard
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dashboardDropdown bg-dark">
                        {{-- <li><x-nav-link href="{{ route('dashboard') }}" >Dashboard</x-nav-link></li> --}}
                        <li><x-nav-link href="{{ route('product.index') }}" >Product</x-nav-link></li>
                    </ul>
                </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-light">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">Login</x-nav-link>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .dropdown-menu {
        background-color: #343a40;
    }

    .dropdown-menu .nav-link {
        color: #ffffff; 
    }

    .dropdown-menu .nav-link:hover {
        background-color: #007bff; 
        color: #ffffff; 
    }
</style>




