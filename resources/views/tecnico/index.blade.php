@extends('layouts.tecnico')

@section('content2')
<div class="container-fluid" style="margin-top: 90px;  max-width: 90%; "> 
<div class="card">
        <div class="card-header">
            <h1 style = "float: left">Bandeja de entrada</h1> 
            
<br/>
            <table class="table table-hover  {{-- table-bordered --}} table-responsive-xl ">
                <caption style="max-width: 50%">Tickets recibidos recientemente</caption>
                    <thead class="table-dark">
                        <tr>
                        {{-- <th>#id_ticket</th> --}}
                        <th>#</th>
                        <th>Descripcion</th>
                        <th>Nombre de Usuario</th>
                        <th>Estado</th>
                        <th>Tecnico Asignado</th>
                        <th>Area</th>
                        <th>Fecha de envio</th>
                        <th>Opciones</th>
                        </tr>
                     </thead>

                <tbody>
        @forelse( $tickets as $ticket)
                @if($ticket->id_estado == 1)
                            <tr>
                                <td>{{ ++$i }}</td>
                           {{--  <td>{{ $ticket["id"] }}</td> --}}
                            <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
                            <td>{{ $ticket->user->name}}</td>
                            <td>{{ $ticket->estado->tipo_estado}}</td>
                            <td>{{ $ticket["tecnico_asignado"] }}</td>
                            <td>{{ $ticket->user->area->nombre_area}}</td>
                            <td>{{ $ticket["created_at"] }}</td>
                            <td>
                
                <form action="{{ url('/tecnico/'.$ticket["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                </form>
                |
                <a class="btn btn-info" href= "{{ route('tecnico.show',$ticket->id) }}">Ver</a>
                            </td>
                            </tr>
                            @endif
                    @empty       
            @endforelse
                </tbody>

                </table>
            <div style="max-width: 50%">{!! $tickets->links() !!}</div>
        </div>
    </div>
</div>
@endsection