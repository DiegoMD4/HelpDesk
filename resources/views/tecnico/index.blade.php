@extends('layouts.tecnico')

@section('content2')
<div class="container-fluid" style="margin-top: 90px;  max-width: 90%; "> 

    {{-- alerta --}}
    {{--  <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>
    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 1325);
    </script> 

    @if(Session::has('mensaje'))
        <div id="alert" class="toast alert-dismissible fade show position-fixed bottom-0 end-0 p-3;
     width: 590px" role="alert" style="z-index: 11; margin: 60px; float: left;">
            <div class="d-flex">
                <div class="toast-header">
                    <strong class="me-auto">Notificación</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                        <div class="toast-body">
                        {{Session::get('mensaje')}}
                </div>
            </div>
        </div>
    @endif --}}
    {{-- alerta --}}


<div class="card">
        <div class="card-header">
            <h1 style = "float: left">Bandeja de entrada</h1> 
            
<br/>
            <table class="table table-hover  {{-- table-bordered --}} table-responsive-xl ">
                <caption style="max-width: 50%">Lista de tickets enviados por {{Auth::user()->name}}</caption>
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
      
       @if($ticket->user->name == Auth::user()->name)
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
                
                <a class="btn btn-warning" href= "{{ url('/tecnico/'.$ticket["id"].'/edit')}}">Editar</a>
                |
                <form action="{{ url('/tecnico/'.$ticket["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                </form>
                |
                <a class="btn btn-info" href= "{{ route('tecnico.show',$ticket->id) }}">Ver</a>
           @endif
                            </td>
                            </tr>
                            @empty 
                            
                            
            @endforelse
                </tbody>

                </table>
            <div style="max-width: 50%">{!! $tickets->links() !!}</div>
        </div>
    </div>
</div>
@endsection
