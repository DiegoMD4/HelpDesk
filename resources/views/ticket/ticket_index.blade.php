@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px;  max-width: 90%; "> 

     <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
        </script>

    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 1220);
    </script> 

    @if(Session::has('mensaje'))
    <div id="alert" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 p-3; width: 590px" role="alert" style="z-index: 11; margin: 60px">
        <div class="d-flex">
            <div class="toast-body">
            {{Session::get('mensaje')}}
    <button  class="btn-close" data-bs-dismiss="toast" aria-label="Close">
    </button>
</div>
</div>
    </div>
    @endif

<div>
<h1 style = "float: left">Historial de tickets enviados</h1> 

<div class="container-fluid" style="width: 28%; float: right">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Buscar Tickets" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </form>
  </div>
<br/>

<table class="table table-hover table-bordered table-responsive-xl ">
    <caption>Lista de tickets</caption>
    <thead class="table-dark">
        <tr>
            <th>#id_ticket</th>
            <th>Descripcion</th>
            <th>Nombre de Usuario</th>
            <th>Estado</th>
            <th>Tecnico Asignado</th>
            <th>Area</th>
            <th>Fecha de envio</th>
            <th></th>
            
        </tr>
    </thead>

    <tbody>
        @foreach( $tickets as $ticket)
        <tr>
            <td>{{ $ticket["id"] }}</td>
            <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
            <td>{{ $ticket["nombre_usuario"] }}</td>
            <td>{{ $ticket["estado"] }}</td>
            <td>{{ $ticket["tecnico_asignado"] }}</td>
            <td>{{ $ticket["area"] }}</td>
            <td>{{ $ticket["created_at"] }}</td>

            <td>
                
                <a class="btn btn-warning" href= "{{ url('/ticket/'.$ticket["id"].'/edit')}}">Editar</a>
                |
                <form action="{{ url('/ticket/'.$ticket["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $tickets->links() !!}
</div>
</div>
@endsection