<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Find Kerja Tech in Malaysia 🇲🇾 | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="h-100">
    <div id="app" class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <span class="badge text-bg-dark fs-5 fw-normal">{{ config('app.name', '{KerjaTech;}') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-light my-1 me-2" href="{{route('freelancer')}}">🚀 Freelancer</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light my-1 me-2" href="{{route('employer.register')}}">📢 Post Jobs</a>
                        </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-light my-1 me-2" href="{{ route('login') }}">⛅ {{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-dark my-1" href="{{ route('register') }}">⚡ {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="btn btn-light my-1 me-2" href="{{route('freelancer')}}">🚀 Freelancer</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light my-1 me-2" href="{{ route('dashboard') }}">🖥️ Dashbaord</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{route('profile.edit', Auth::user()->id)}}" class="dropdown-item">Profile</a>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="mt-auto py-4 w-100 bg-dark">
            <div class="container text-light d-flex justify-content-between">
                <span>&copy; {{date('Y')}} kerjatech.my (syhrzkwn.dev)</span>
                <span><a href="https://github.com/syhrzkwn/kerjatech.my" target="_blank" class="link-light">Source Code<i class=" ms-2 bi bi-github"></i></a></span>
            </div>
        </footer>
    </div>
</body>
</html>
