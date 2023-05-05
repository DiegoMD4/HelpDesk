@extends('layouts.admin')
@section('content1')
<div style="margin-top: 70px;"> 
<div class="card">
    <div class="container-fluid card-header d-flex justify-content-between align-items-center">
        <h1>Listado de Usuarios</h1> 
        <a href="{{ url('/admin/create')}}" class="btn btn-primary ms-auto" role="button">
            <i class="bi bi-plus-lg me-2"></i>Crear Usuario</a>
    </div>
    
            <div class="card-body">
                <table class="table table-hover table-responsive-xl ">
                    <caption style="max-width: 50%">Lista de usuarios</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th>#id_usuario</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Area</th>
                            <th>Role</th>
                            <th>Acción</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user)
                        <tr>
                            <td>{{ $user["id"] }}</td>
                            <td>{{ $user["name"] }}</td>
                            <td>{{ $user["email"] }}</td>
                            <td>{{ $user->area->nombre_area }}</td>
                            <td>{{ $user->role->nombre_rol }}</td>
                            <td  style="display: flex">
                                <a class="btn btn-warning  mr-2" href="{{ url('/admin/'.$user["id"].'/edit')}}">Editar</a>
                                <form action="{{ url('/admin/'.$user["id"]) }}" class="d-inline" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Desea eliminar este elemento?')" value = "Borrar">
                                </form>
                               
                            </td>
                            
                        </tr>
                        
                        @endforeach
                    </tbody>

                </table>
                <div style="max-width: 50%"> {!! $users->links() !!} </div>
                            
        </div>
            </div>
                
    </div>

@endsection