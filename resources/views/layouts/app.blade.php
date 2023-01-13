<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dziennik ucznia') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container ">
                <a class="navbar-brand" href="{{ url('/journal') }}">
{{--                    {{ config('app.name', 'Dziennik ucznia') }}--}}
                    Dziennik ucznia
                </a>
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/journal">Dziennik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/students">Lista uczniów</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="/teachers">Lista nauczycieli</a>
                                </li>
                                @if( Auth::check() && Auth::user()->isAdmin() )
                                    <li class="nav-item margin">
                                        <a class="btn btn-primary" href="/users" tabindex="-1" aria-disabled="true">Użytkownicy</a>
                                    </li>
                                    <li class="nav-item margin">
                                        <a class="btn btn-primary" href="/register" tabindex="-1" aria-disabled="true">Zarejestruj użytkownika</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if(URL::current() == url('/journal'))
                        <form class="d-flex margin" action="">
                            <input class="form-control me-2" type="search" placeholder="Nazwa przedmiotu" aria-label="Search" name="phrase">
                            <button class="btn btn-outline-success" type="submit">Szukaj</button>
                        </form>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
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
    </div>
</body>
</html>
