<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @switch(request()->path())
    @case('/')
    <title>Pal Watch Store | Home</title>
        @break

        @case('products')
        <title>Pal Watch Store | Products</title>
        @break

        @case('about')
        <title>Pal Watch Store | About</title>
        @break

        @case('contact')
        <title>Pal Watch Store | Contacts</title>
        @break

    @default
    <title>Pal Watch Store </title>
@endswitch

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .active {
            text-shadow: 0px 0px 1px #3a4a4b;
        }
    </style>
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container fw-bold fs-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="text-dark fw-bolder fs-3 p-2 py-3 bg-secondary badge"><span class="text-warning"><i
                                class="bi bi-watch fs-2"></i> Pal Wat</span>ch Store</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item {{ request()->path() === '/' ? 'active' : '' }}"><a href="/"
                                class="nav-link">
                                Home</a></li>
                        <li class="nav-item {{ request()->path() === 'products' ? 'active' : '' }}"><a href="/products"
                                class="nav-link">
                                Products</a></li>

                        <li class="nav-item {{ request()->path() === 'about' ? 'active' : '' }}"><a href="/about"
                                class="nav-link">
                                About</a></li>

                        <li class="nav-item {{ request()->path() === 'contact' ? 'active' : '' }}"><a href="/contact"
                                class="nav-link">
                                Contacts</a></li>


                      @can('customer')
                      <li class="nav-item {{ request()->path() === 'favorite' ? 'active' : '' }}"><a href="/favorite"
                        class="nav-link  ">
                         <i class="bi bi-heart-fill fs-3"></i></a></li>
                      @endcan


                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                            class="fw-bold fs-6"><i class="bi bi-box-arrow-left "></i></span>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item fw-bold fs-6" href="/profile"> <i
                                            class="bi bi-person-circle"></i> Profile</a>


                                    @can('customer')
                                        <a class="dropdown-item fw-bold fs-6" href="/cart">
                                            <i class="bi bi-cart4 "></i> Cart
                                        </a>
                                    @endcan

                                    @can('admin')
                                        <a class="dropdown-item fw-bold fs-6" href="/users">
                                            <i class="bi bi-clipboard-data"></i> Dashboard
                                        </a>
                                    @endcan
                                </div>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <x-cart></x-cart>


        <main class="">
            @yield('content')
        </main>
    </div>


</body>

</html>
