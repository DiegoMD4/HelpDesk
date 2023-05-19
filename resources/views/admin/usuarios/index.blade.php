@extends('layouts.admin')
@section('content1')
<div style="margin-top: 20px;">
    
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h1>Listado de usuarios</h1>
            <a href="{{ url('/admin/create')}}" class="btn btn-primary ms-auto" role="button">
                <i class="bi bi-plus-lg me-2"></i>Crear Usuario</a>
        </div>
        
    
@foreach ($users as $user)
<div class="list-group">

    <a href="{{ url('/admin/'.$user["id"].'/edit')}}" class="list-group-item list-group-item-action">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">{{$user->name}}</h5>
        <form action="{{ url('/admin/'.$user["id"]) }}" class="d-inline" method="POST">
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-danger btn-sm" type="input" onclick="return confirm('¿Desea eliminar este elemento?')">
                <i class="bi bi-trash"></i>Eliminar</button>
        </form>
    </div>
    <label class="mb-1">ID: {{$user->id}}</label> /
    <label class="mb-1">Correo: {{$user->email}}</label> /
      <label class="mb-1">Area: {{$user->area->nombre_area}}</label> /
      <label class="mb-1">Rol: {{$user->role->nombre_rol}}</label> 
      
    
        
      
    </a>
    
  </div>
@endforeach
<br>
<div style="max-width: 50%"> {!! $users->links() !!} </div>
    
    
</div>

@endsection

