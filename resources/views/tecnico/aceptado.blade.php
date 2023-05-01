@extends('layouts.tecnico')

@section('content2')
<div class="container-fluid" style="margin-top: 90px; "> 
    <div class="card">
        <div class="container-fluid card-header">
            <h1 style = "float: left">Tickets aceptados</h1> 
            <br/>
        </div>
        <div class="card-body">
            <table class="table table-hover table-info table-responsive-xl ">
                <caption style="max-width: 50%">Tickets que aceptaste o te asignaron recientemente</caption>
                    <thead class="thead-dark">
                        <tr>
                        <th>#id_ticket</th>                        
                        <th>Descripcion</th>
                        <th>Nombre de Usuario</th>
                        <th>Estado</th>
                        {{-- <th>Tecnico Asignado</th> --}}
                        <th>Area</th>
                        <th>Fecha de envio</th>
                        <th>Opciones</th>
                        </tr>
                     </thead>
                <tbody>
        @forelse( $tickets as $ticket)
                            <tr>
                            <td>{{ $ticket["id"] }}</td> 
                            <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
                            <td>{{ $ticket->user->name}}</td>
                            <td>{{ $ticket->estado->tipo_estado}}</td>
                            {{-- <td>{{ $ticket["tecnico_asignado"] }}</td> --}}
                            <td>{{ $ticket->user->area->nombre_area}}</td>
                            <td>{{ $ticket["created_at"] }}</td>
                            <td style="display: flex">
                                
                                    <form action="{{ url('/aceptado/'.$ticket["id"]) }}" class="d-inline" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="btn btn-danger mr-2" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Descartar">
                                    </form>
                                    
                                        <a class="btn btn-info" href= "{{ route('tecnico.show',$ticket->id) }}"> Detalles </a>
                            </td>
                            </tr>
                    @empty  
                    <tr>
                        <td colspan="8">
                            <p style="text-align: center">No tienes tickets que atender</p>
                        </td>
                    </tr>     
            @endforelse
                </tbody>

                </table>
            <div style="max-width: 50%">{!! $tickets->links() !!}</div>
        </div>          
    </div>
</div>
@endsection
