@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript">
    setTimeout(function () {
        $('#alert').alert('close');
    }, 1325);
</script>

@if(Session::has('mensaje'))
    <div id="alert" class="toast alert-dismissible fade show position-fixed bottom-0 end-0 p-3"
         style="z-index: 11; margin: 10px; max-width: 100%; min-width: 200px;">
        <div class="d-flex justify-content-between toast-header">
            <strong class="me-auto">Notificación</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('mensaje')}}
        </div>
    </div>
@endif


<div class="container" style="margin-top: 35px;" >
  <div class="row justify-content-center">
    <div class="col-5 text-center">
      <h1><strong>Historial</strong></h1>
    </div>
    <div class="col-6 text-center">
      <a href="{{ url('/ticket/create') }}" class="btn btn-primary" type="submit">
        <i class="bi bi-plus-lg me-2"></i>Nuevo Ticket</a>
    </div>
  </div>
</div>

<div class="container-centered" style="margin-top: 15px">
@forelse( $tickets as $ticket)
    <div class="card">
      <div class=" card-header d-flex justify-content-between">
          <h4 class="card-tittle"><strong>ID de Ticket: {{$ticket["id"]}}</strong></h4>
          <a class="btn btn-info btn-sm flex" href="{{ route('ticket.show',$ticket->id) }}">
          <i class="bi bi-eye-fill"></i>Ver</a>
      </div>
      <div class="card-body">
        
        <strong>Descripción:</strong><p class="card-text">{{$ticket["descripcion"]}}</p>
        <strong>Usuario: </strong>{{$ticket->user->name}}<br>

        @switch($ticket->estado->tipo_estado)
            @case("Pendiente")
            <strong>Estado: </strong><label class="text-danger">{{$ticket->estado->tipo_estado}}</label><br>
                @break
            @case("Aceptado")
            <strong>Estado: </strong><label class="text-success">{{$ticket->estado->tipo_estado}}</label><br>
                @break
            @default
                
        @endswitch
        
        <strong>Tecnico Asignado: </strong>{{$ticket->tecnico_asignado}}<br>
        <strong>Area: </strong>{{$ticket->user->area->nombre_area}}<br>
        <strong>Fecha: </strong>{{$ticket["created_at"]}}<br>        
      </div>

      <div class="card-footer">
        <a class="btn btn-warning btn-sm" href="{{ url('/ticket/'.$ticket["id"].'/edit')}}">
          <i class="bi bi-pencil-fill"></i>Editar</a>
        <form action="{{ url('/ticket/'.$ticket["id"]) }}" class="d-inline" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="input" class="btn btn-danger btn-sm" type="submit" 
          onclick="return confirm('¿Desea eliminar este elemento?')" value="Borrar">
          <i class="bi bi-trash"></i>Borrar</button>
        </form>
      </div>
    </div>
    <br>
    @empty
    <br>
    <div class="container" style="text-align: center">
        <h3 class="text-danger">No se encontraron registros</h3>
    </div>
    @endforelse
  
    <br>
    <div style="max-width: 50%">{!! $tickets->appends(['busqueda'=> $busqueda]) !!}</div>
  </div>
  


@endsection