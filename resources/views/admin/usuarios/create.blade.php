@extends('layouts.admin')

@section('content1')
 
<div class="container content-fluid">
    <h1>Crear Usuario</h1>

<form action="{{ url('/admin') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('admin.usuarios.form' , ['modo'=>'Crear'])
    
    
</form>

</div>


@endsection