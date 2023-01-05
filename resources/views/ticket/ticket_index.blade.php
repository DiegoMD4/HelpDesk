@extends('layouts.app')

@section('content')
<div class="container table-responsive-xl" style="margin-top: 90px;  max-width: 90%; "> 


    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('mensaje')}}
    <button  class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>
    @endif

    
{{-- <a class="btn btn-primary" href="{{ url('/ticket/create') }}"> Crear Nuevo Ticket</a> --}}

<div>
<h1>Historial de tickets enviados</h1> 


<br/>

<table class="table table-hover table-bordered ">
    <caption>Lista de tickets</caption>
    <thead class="table-dark">
        <tr>
            <th >#id_ticket</th>
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
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Eliminar?')" value = "Borrar">
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