@extends('layouts.app')

@section('content')
<div class="container table-responsive-xl" style="margin-top: 90px;  max-width: 90%; "> 

    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
        </script>

    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 1100);
    </script>

    @if(Session::has('mensaje'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('mensaje')}}</strong>
    <button  class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>
    @endif

    


<div>
<h1 style = "float: left">Historial de tickets enviados</h1> 

<div style="width: 25%; float: right;"><form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Buscar ticket" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Buscar</button>
  </form>
</div>
<br/>

<table class="table table-hover table-bordered ">
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