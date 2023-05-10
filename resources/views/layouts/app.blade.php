<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="" >
    <div id="app">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid" style="max-width: 90%">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/ser.png') }}" width="55" height="24" class="d-inline-block align-text-top" alt="logo">
        {{ config('app.name', 'Laravel') }}</a>
        
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto">
        @auth
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Historial</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Calificaciones</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        {{-- Searchbar --}}
        <form class="d-flex">
          <input name="busqueda" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
        </form>
        {{-- Searchbar --}}
        @endauth
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>@if(Auth()->check() && auth()->user()->id_rol == '1')
                                    
                <a class="dropdown-item" href="{{url('/admin')}}">
                    {{ __('Panel de Administrador') }}
                </a>
                @endif
                @if(Auth()->check() && auth()->user()->id_rol == '2')
                
                <a class="dropdown-item" href="{{url('/tecnico')}}">
                    {{ __('Panel de Técnico') }}
                </a>
                @endif</li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @endguest
          </ul>
        </li>
      </ul>
        
    </div>
  </div>
</nav>

        <main class="py-4;">
            @yield('content')
        </main>
    </div>
</body>
</html>
