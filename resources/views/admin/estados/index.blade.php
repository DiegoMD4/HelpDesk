@extends('layouts.admin')
@section('content1')

<div class="container" style="margin-top: 90px;  max-width: 90%; "> 
<div>
<h1 style = "float: left">Listado de Estados</h1> 

    <form class="d-flex">
    <a style="float: right; margin-left: 65%;" href="{{ url('/estados/create')}}"  class="btn btn-primary" type="submit">Nuevo Estado</a>
    </form>
  
<br/>

<table class="table table-hover {{-- table-bordered --}} table-responsive-xl ">
    <caption style="max-width: 50%">Lista de Estados</caption>
    <thead class="table-dark">
        <tr>
            <th>#id_estados</th>
            <th>Estado</th>
            <th>Opciones</th>

            
        </tr>
    </thead>

    <tbody>
        @foreach( $estados as $estado)
       
        <tr>
            <td>{{ $estado["id"] }}</td>
            <td>{{ $estado["tipo_estado"] }}</td>


            <td>
                
                <a class="btn btn-warning" href= "{{ url('/admin/'.$estado["id"].'/edit')}}">Editar</a>
                |
                <form action="{{ url('/admin/'.$estado["id"]) }}" class="d-inline" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                  
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                </form>
          

            </td>
        </tr>
        
        @endforeach
    </tbody>

</table>
<div style="max-width: 50%"> {!! $estados->links() !!} </div>
</div>
</div>
@endsection