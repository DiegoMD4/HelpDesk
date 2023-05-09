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
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm" style="position: fixed; width: 100%; top: 0; z-index: 100">
            <div class="container" style="max-width: 90%" >
                <a class="navbar-brand" href="{{ url('/') }}" style="display: flex; align-items: center;">
                    <img src="https://funazucar.org/modules/my-apostrophe-assets/img/ingenios/ser.png" alt="logo" height="35px" style="margin-right: 10px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

             

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    

                    @auth
                    {{-- <div class="btn-group">
                        <a href="{{url('/ticket')}}" class="btn btn-dark">Historial</a>
                        <a href="{{url('/pendiente')}}" class="btn btn-dark">Tickets Enviados</a>
                      </div> --}}
                      
                    @else
                    
                    
                    @endauth
                   
                  
                    <ul class="navbar-nav ms-auto">
                       
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth()->check() && auth()->user()->id_rol == '1')
                                    
                                    <a class="dropdown-item" href="{{url('/admin')}}">
                                        {{ __('Panel de Administrador') }}
                                    </a>
                                    @endif
                                    @if(Auth()->check() && auth()->user()->id_rol == '2')
                                    
                                    <a class="dropdown-item" href="{{url('/tecnico')}}">
                                        {{ __('Panel de Técnico') }}
                                    </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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

        <main class="py-4;">
            @yield('content')
        </main>
    </div>
</body>
</html>
