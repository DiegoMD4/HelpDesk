@extends('layouts.admin')
@section('content1')

<div class="container-fluid" style="margin-top: 70px;  max-width: 100%; "> 
    <div class="card">
        <div class="card-header">
            <h1 style="float: left">Tickets asignados</h1>
        </div>
            <div class="card-body">
                <table class="table table-hover table-responsive-xl">
                    <caption style="max-width: 50%">Tickets asignados recientemente</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>#id_ticket</th> 
                            <th>Descripcion</th>
                            <th>Nombre de Usuario</th>
                            <th>Estado</th>
                            <th>Tecnico Asignado</th>
                            <th>Area</th>
                            <th>Fecha de envio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket["id"] }}</td> 
                                    <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold">{{ $ticket["descripcion"] }}</td>
                                    <td>{{ $ticket->user->name}}</td>
                                    <td>{{ $ticket->estado->tipo_estado}}</td>
                                    <td>{{ $ticket["tecnico_asignado"] }}</td>
                                    <td>{{ $ticket->user->area->nombre_area}}</td>
                                    <td>{{ $ticket["created_at"] }}</td>
                                    <td style="display: flex">
                                        <a class="btn btn-info mr-2" href= "{{ url('/entrada/'.$ticket["id"].'/edit')}}">Reasignar</a>
                                            <form action="{{ url('/entrada/'.$ticket["id"]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value="Descartar">
                                            </form>
                                    </td>
                                </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <p style="text-align: center">No se han asignado o aceptado tickets</p>
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
