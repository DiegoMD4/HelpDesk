@extends('layouts.admin')
@section('content1')
<div class="container" style="margin-top: 90px;  max-width: 90%; "> 

    {{-- alerta --}}
    {{--  <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
        </script>

    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 1220);
    </script> 

    @if(Session::has('mensaje'))
    <div id="alert" class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 p-3;
     width: 590px" role="alert" style="z-index: 11; margin: 60px; float: left;">
        <div class="d-flex">
            <div class="toast-body">
            {{Session::get('mensaje')}}
    <button  class="btn-close" data-bs-dismiss="toast" aria-label="Close">
    </button>
</div>
</div>
    </div>
    @endif --}}
    {{-- alerta --}}


<div>
<h1 style = "float: left">Listado de areas</h1> 


        <a style="margin-left: 65%;" href="{{ url('/areas/create')}}"  class="btn btn-primary" type="submit">Nueva Area</a>
    
<br/>

<table class="table table-hover {{-- table-bordered --}} table-responsive-xl ">
    <caption style="max-width: 50%">Areas creadas</caption>
    <thead class="table-dark">
        <tr>
            <th>#id_area</th>
            <th>Area</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $areas as $area)
        <tr>
            <td>{{ $area["id"] }}</td>
            <td>{{ $area["nombre_area"] }}</td>
          
            <td>
                
                <a class="btn btn-warning" href= "{{ url('/areas/'.$area["id"].'/edit')}}">Editar</a>
                |
                <form action="{{ url('/areas/'.$area["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                </form>

            </td>
        </tr>
        
        @endforeach
    </tbody>

</table>
<div style="max-width: 50%"> {!! $areas->links() !!} </div>
</div>
</div>
@endsection