@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: 90px;  max-width: 90%; "> 
    <div class="card">
        <div class="card-header">
    {{-- alerta --}}
     <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>
    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 1325);
    </script> 


@if(Session::has('mensaje'))
    <div id="alert" class="toast alert-dismissible fade show position-fixed bottom-0 end-0 p-3" 
         style="z-index: 11; margin: 60px; max-width: 400px;">
        <div class="d-flex justify-content-between toast-header">
            <strong class="me-auto">Notificación</strong>
            <span class="me-2"></span>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('mensaje')}}
        </div>
    </div>
@endif


    {{-- alerta --}}


    <div class="container-fluid">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
          <h1 class="float-start mb-0 me-3">Historial</h1>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-6 text-center my-3 my-md-0">
          <form class="d-flex" action="{{ route('ticket.index')}}" method="GET">
            <div class="input-group">
              <input class="form-control" name="busqueda" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
              <a href="{{ url('/ticket')}}" class="btn btn-outline-secondary" type="submit">Limpiar búsqueda</a>
            </div>
          </form>
        </div>
        <div class="col-sm-4 col-md-6 col-lg-2 text-end">
          <a href="{{ url('/ticket/create')}}" class="btn btn-primary" type="submit"><i class="bi bi-plus-lg me-2"></i>Nuevo Ticket</a>
        </div>
      </div>
    </div>
    
    <div class="clearfix"></div>
  
  <div class="table-responsive">
    <table class="table table-hover">
      <caption>Lista de tickets enviados por {{Auth::user()->name}}</caption>
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Descripción</th>
          <th>Nombre de Usuario</th>
          <th>Estado</th>
          <th>Técnico Asignado</th>
          <th>Área</th>
          <th>Fecha de envío</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        @forelse( $tickets as $ticket)
          @if($ticket->user->name == Auth::user()->name)
            <tr>
              <td>{{ $ticket["id"] }}</td>
              <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
              <td>{{ $ticket->user->name}}</td>
              <td>{{ $ticket->estado->tipo_estado}}</td>
              <td>{{ $ticket["tecnico_asignado"] }}</td>
              <td>{{ $ticket->user->area->nombre_area}}</td>
              <td>{{ $ticket["created_at"] }}</td>
              <td>
                <div class="d-flex justify-content-between flex-wrap">
                  <a class="btn btn-warning mb-1 me-1 flex-grow-1" href="{{ url('/ticket/'.$ticket["id"].'/edit')}}">
                    <i class="bi bi-pencil-fill"></i>Editar</a>
                  <form action="{{ url('/ticket/'.$ticket["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="input" class="btn btn-danger mb-1 mx-1 flex-grow-1" type="submit" 
                    onclick="return confirm('¿Desea eliminar este elemento?')" value="Borrar">
                    <i class="bi bi-trash"></i>Borrar</button>
                  </form>
                  <a class="btn btn-info mb-1 ms-1 flex-grow-1" href="{{ route('ticket.show',$ticket->id) }}">
                    <i class="bi bi-eye-fill"></i>Ver</a>
                </div>
              </td>
            </tr>
                @endif
            @empty
        @endforelse
      </tbody>
    </table>
<div style="max-width: 50%">{!! $tickets->appends(['busqueda'=> $busqueda]) !!}</div>
  </div>
</div>
</div>

</div>
@endsection
