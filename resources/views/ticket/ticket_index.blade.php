<table class="table table-dark">

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
            <td>{{ $ticket->id_ticket }}</td>
            <td>{{ $ticket->descripcion }}</td>
            <td>{{ $ticket->nombre_usuario }}</td>
            <td>{{ $ticket->estado }}</td>
            <td>{{ $ticket->tecnico_asignado }}</td>
            <td>{{ $ticket->area }}</td>

            <td>Editar |

                <form action="{{url('/ticket/'.$ticket->id_ticket)}}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    
                <input type="submit" onclick="return confirm('¿Eliminar?')" value = "Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>