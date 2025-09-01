<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mobile Zone|User')</title>
    @vite(['resources/css/app.css','resources/css/admin.css','resources/css/style.css','resources/js/app.js'])

    <style>
    .toast-container {
        position: fixed;
        top: 120px;
        right: 1rem;
        z-index: 1055;
    }

    .toast {
        display: flex;
        align-items: center;
        width: 50px;
        margin-top: 10px;
        padding: 4px 6px;
        border-radius: 8px;
        color: #fff;
        font-weight: 500;
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        opacity: 0;
        transform: translateY(20px);
        animation: slideIn 0.5s forwards, fadeOut 0.5s 6s forwards;
    }

    .toast-success { background: #28a745; } /* green */
    .toast-error { background: #dc3545; }   /* red */

    @keyframes slideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeOut {
        to {
            opacity: 0;
            transform: translateY(20px);
        }
    }
    </style>
</head>
<body>
    <!-- Navbar + Topbar -->
    @include('layouts.navbar')

    <!-- Content Section -->
    <main class="container pt-4" style="margin-top: 120px;">
        @include('layouts.message')
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    @stack('scripts')  
</body>
</html>