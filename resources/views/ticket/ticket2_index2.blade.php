@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: 90px;  max-width: 90%; "> 
    <div class="card">
  


    <div class="container-fluid card-header" >
      <div class="row">
        <div class="col">
          <h4>Historial</h4>
        </div>
        <div class="col-md-auto">
          <form class="d-flex" action="{{ route('ticket.index') }}" method="GET">
            <div class="input-group">
              <input class="form-control" name="busqueda" type="search" placeholder="Buscar Ticket..." aria-label="Search">
              <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
              <a href="{{ url('/ticket') }}" class="btn btn-outline-secondary" type="submit">Limpiar búsqueda</a>
            </div>
          </form>
        </div>
        <div class="col">
          <a href="{{ url('/ticket/create') }}" class="btn btn-primary mt-2 mt-md-0" type="submit">
            <i class="bi bi-plus-lg me-2"></i>Nuevo Ticket
          </a>
        </div>
      </div>
    </div>
    <br>
  
  <div class="table-responsive card-body">
    <table class="table table-hover">
      <caption>Lista de tickets enviados por {{Auth::user()->name}}</caption>
      <thead>
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
               
            @empty
            <tr>
              <td colspan="8">
                <h3 style="text-align: center">No se encontraron registros</h3>
              </td>
            </tr>
        @endforelse
      </tbody>
    </table>
<div style="max-width: 50%">{!! $tickets->appends(['busqueda'=> $busqueda]) !!}</div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
