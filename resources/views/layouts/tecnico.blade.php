<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
          @php
          use App\Models\Tickets;
          function notificacion(){
          $contador = Tickets::where('id_estado', 1)->where('tecnico_asignado','Pendiente')
          ->get();
          $notificador = $contador->count();
          return($notificador);
            }
      @endphp
        <style>
        .list-group-item {
        /* background-color: #212529;
        color: #ccc; */
        }
        </style>    
    </head>
    <body>
        <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><b>HelpDesk Técnico</b></div>
        <div class="list-group list-group-flush">
            <a href="{{url('/tecnico')}}" class="list-group-item list-group-item-action">
                <i id="icons" class="bi bi-inbox-fill"></i>Bandeja de entrada
                @if(notificacion() !=0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ml-2">
                    {{notificacion()}}
                </span>
                @else 
                @endif
                </a> 
                
                
        </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <nav id="navigation" class="navbar navbar-expand-lg border-bottom">
            <button class="btn btn-primary" id="menu-toggle"><i class="bi bi-arrow-left-right"></i></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a id="link" class="nav-link" href="{{url('/aceptado')}}"><i class="bi bi-pin-angle-fill"></i>Aceptados</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/ticket')}}">Regresar a vista de usuario</a>
                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            </div>
        </nav>

        <div class="container-fluid p-0">
            
                @yield('content2')
            
        </div>
        </div>
        <!-- /#page-content-wrapper -->
                
        </div>
        <!-- /#wrapper -->
        
    </body>
</html>