@extends('layouts.tecnico')
@section('content2')


            <table class="table table-hover table-responsive-sm">
                <caption style="max-width: 50%;">Tickets recibidos recientemente</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
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
                    @forelse($tickets as $ticket)
                    @if($ticket->id_estado == 1)
                    <tr>
                        <td>{{ $ticket["id"] }}</td>
                        <td style="max-width: 200px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; font-weight: bold;">{{ $ticket["descripcion"] }}</td>
                        <td>{{ $ticket->user->name}}</td>
                        <td>{{ $ticket->estado->tipo_estado}}</td>
                        <td>{{ $ticket["tecnico_asignado"] }}</td>
                        <td>{{ $ticket->user->area->nombre_area}}</td>
                        <td>{{ $ticket["created_at"] }}</td>
                        <td style="display: flex;">
                            <form action="{{ url('/tecnico/'.$ticket["id"]) }}" class="d-inline" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger mr-2" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value="Descartar">
                            </form>
                            
                            <a class="btn btn-info" href="{{ url('/tecnico/'.$ticket["id"].'/edit')}}">Detalles</a>
                        </td>
                    </tr>
                    @endif
                    @empty       
                    @endforelse
                </tbody>
            </table>
            <div style="max-width: 50%;">{!! $tickets->links() !!}</div>
     
@endsection
