@php
    if (Auth::check()) {
        $cartCount = App\Models\Cart::where('user_id', Auth::id())->count();
        $notiCount = App\Models\Notification::where('user_id', Auth::id())->where('condition','unseen')->count();
    }else{
        $cartCount = 0;
        $notiCount = 0;
    }
@endphp
<!-- Fixed Container for Topbar + Navbar -->
{{-- <div class="fixed-top bg-white shadow-sm" style="z-index: 1030;">
    @include('layouts.top-navbar')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(168, 231, 175)">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('pj-img/mobilezone.png') }}" alt="img" width="250px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('product')}}" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us</a></li>
                    <li class="nav-item position-relative">
                        <a href="{{route('cart.index')}}" class="nav-link nav-cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                        </a>
                    </li>
                    @auth
                        <li class="nav-item position-relative">
                            <a href="{{route('notificaton.index')}}" class="nav-link nav-cart">
                                <i class="fa-solid fa-bell"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $notiCount }}
                                    </span>
                            </a>
                        </li>
                    @endauth
                </ul>
                @auth
                    <div class="dropdown">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('my-order')}}">Pruchase History</a></li>
                            <li>
                                <form method="GET" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div> --}}
<!-- Fixed Top Navbar -->
<div class="fixed-top bg-white shadow-sm" style="z-index: 1030;">
    @include('layouts.top-navbar')

    <nav class="navbar navbar-expand-lg" style="background-color: #a8e7af;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('pj-img/mobilezone.png') }}" alt="MobileZone" width="250px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3 align-items-center">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link px-3 py-2 {{ request()->is('/') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                            Home
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('product') }}" class="nav-link px-3 py-2 {{ request()->is('product') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                            Products
                        </a>
                    </li> --}}
                    <li class="nav-item">
    <a href="{{ route('product') }}" 
       class="nav-link px-3 py-2 {{ request()->is('product') || request()->is('product*') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
        Products
    </a>
</li>

                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link px-3 py-2 {{ request()->is('about') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link px-3 py-2 {{ request()->is('contact') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                            Contact Us
                        </a>
                    </li>

                    <!-- Cart -->
                    <li class="nav-item position-relative">
                        <a href="{{ route('cart.index') }}" class="nav-link px-3 py-2 {{ request()->is('cart*') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        </a>
                    </li>

                    <!-- Notification -->
                    @auth
                        <li class="nav-item position-relative ms-2">
                            <a href="{{ route('notificaton.index') }}" class="nav-link px-3 py-2 {{ request()->is('notification*') ? 'active fw-bold text-white bg-success rounded' : 'text-dark' }}">
                                <i class="fa-solid fa-bell"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $notiCount }}
                                </span>
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- User Dropdown -->
                @auth
                    <div class="dropdown ms-3">
                        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('my-order') }}">Purchase History</a></li>
                            <li>
                                <form method="GET" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</div>

