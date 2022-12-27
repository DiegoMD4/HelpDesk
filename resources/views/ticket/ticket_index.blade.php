@extends('layouts.app')

@section('content')
<div class="container"> 

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a class="btn btn-primary" href="{{ url('/ticket/create') }}"> Crear Nuevo Ticket</a>

<br/>
<br/>

<table class="table table-hover">

    <thead class="thead-light">
        <tr>
            <th>#id_ticket</th>
            <th>Descripcion</th>
            <th>Nombre de Usuario</th>
            <th>Estado</th>
            <th>Tecnico Asignado</th>
            <th>Area</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $tickets as $ticket)
        <tr>
            <td>{{ $ticket["id"] }}</td>
            <td>{{ $ticket["descripcion"] }}</td>
            <td>{{ $ticket["nombre_usuario"] }}</td>
            <td>{{ $ticket["estado"] }}</td>
            <td>{{ $ticket["tecnico_asignado"] }}</td>
            <td>{{ $ticket["area"] }}</td>

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
@endsection