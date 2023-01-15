<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" src="styles.css" type="text/css">
   
    
    <!-- Scripts -->
   {{--  @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body >
    <div class="sidenav">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-dark bg-dark shadow-sm" style="position: fixed; width: 100%; top: 0; z-index: 100"> --}}
            <div >
                <a  href="{{ url('/admin') }}">
                  {{-- <img src="https://funazucar.org/modules/my-apostrophe-assets/img/ingenios/ser.png" alt="logo" height="50px" width=""> --}}
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button  aria-label="{{ __('Toggle navigation') }}">
                    <span ></span>
                </button>

             

                <div>
                    <!-- Left Side Of Navbar //aca se modifica la navbar -->
                    @auth
                    <div>
                        <a href="#"  >Crear Usuario</a> 
                        <a href="#" >Ver calificaciones</a>
                        <a href="#" >Pendientes</a>
                      </div>
                    @else
                    
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul >
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li >
                                    <a  href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li >
                                    <a  href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li >
                                <a href="#" role="button" >
                                    {{ Auth::user()->name }}
                                </a>

                                <div >
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        {{-- </nav> --}}

        <main >
            
        </main>
    </div>
</body>
</html>
