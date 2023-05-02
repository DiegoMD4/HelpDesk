@extends('layouts.admin')
@section('content1')
<div class="container" style="margin-top: 70px; max-width: 90%; "> 
    <div class="card">
        <div class="container-fluid card-header d-flex justify-content-between align-items-center">
            <h1>Listado de Areas</h1> 
            <a href="{{ url('/areas/create')}}" class="btn btn-primary ms-auto" role="button">
            <i class="bi bi-plus-lg me-2"></i>Crear Area</a>
        </div>
        
                <div class="card-body">
                    <table class="table table-hover table-responsive-xl ">
                        <caption style="max-width: 50%">Areas de la empresa</caption>
                        <thead class="thead-dark">
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
                                <td style="max-width: 200px; text-overflow: ellipsis; 
                                overflow: hidden; white-space: nowrap; font-weight: bold;">
                                    {{ $area["nombre_area"] }}</td>
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
    </div>
</div>
@endsection