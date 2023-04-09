@extends('layouts.tecnico')

@section('content2')
<div class="container-fluid" style="margin-top: 90px;  max-width: 90%; "> 
<div class="card">
        <div class="card-header">
            <h1 style = "float: left">Tickets aceptados</h1> 
            
<br/>
            <table class="table table-hover table-responsive-xl ">
                <caption style="max-width: 50%">Tickets que aceptaste o te asignaron recientemente</caption>
                    <thead class="table-dark">
                        <tr>
                        <th>#id_ticket</th>                        
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
                @if(($ticket->id_estado == 3) && $ticket["tecnico_asignado"] == Auth::user()->name)
                            <tr>

                            <td>{{ $ticket["id"] }}</td> 
                            <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
                            <td>{{ $ticket->user->name}}</td>
                            <td>{{ $ticket->estado->tipo_estado}}</td>
                            <td>{{ $ticket["tecnico_asignado"] }}</td>
                            <td>{{ $ticket->user->area->nombre_area}}</td>
                            <td>{{ $ticket["created_at"] }}</td>
                            <td style="display: flex">
                                
                                    <form action="{{ url('/tecnico/'.$ticket["id"]) }}" class="d-inline" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger mr-2" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Descartar">
                                    </form>
                                    
                                        <a class="btn btn-info" href= "{{ url('/tecnico/'.$ticket["id"].'/edit')}}"> Detalles </a>
                                 
                                
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
