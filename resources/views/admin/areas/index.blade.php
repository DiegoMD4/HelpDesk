@extends('layouts.admin')
@section('content1')
<div class="container" style="margin-top: 90px;  max-width: 90%; "> 
<div>
<h1 style = "float: left">Listado de Areas</h1> 

<form class="d-flex">
        <a style="margin-left: 65%;" href="{{ url('/areas/create')}}"  class="btn btn-primary" type="submit">Nueva Area</a>
</form>
<br/>

<table class="table table-hover table-responsive-xl ">
    <caption style="max-width: 50%">Areas creadas</caption>
    <thead class="table-dark">
        <tr>
            <th>#id_area</th>
            <th>Area</th>
            <th>Acción</th>
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