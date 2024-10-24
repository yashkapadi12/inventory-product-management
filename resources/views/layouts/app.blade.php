<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <x-navbar /> <!-- Navbar component -->
    </header>

    <!-- Main component -->
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 bg-dark bg-opacity-50">
        <main class="container overflow-hidden">
            <x-toaster/> <!-- Toaster component -->

            @yield('content') <!-- Dynamic content section -->
        </main>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <x-footer/> <!-- Footer component -->
    </footer>
</body>
</html>
