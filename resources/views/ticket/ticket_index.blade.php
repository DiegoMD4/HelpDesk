@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px; back"> 


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

<table class="table table-hover" >
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
            <td class="h5" >{{ $ticket["id"] }}</td>
            <td class="h5" style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
            <td class="h5" >{{ $ticket["nombre_usuario"] }}</td>
            <td class="h5" >{{ $ticket["estado"] }}</td>
            <td class="h5" >{{ $ticket["tecnico_asignado"] }}</td>
            <td class="h5" >{{ $ticket["area"] }}</td>
            <td class="h5" >{{ $ticket["created_at"] }}</td>

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