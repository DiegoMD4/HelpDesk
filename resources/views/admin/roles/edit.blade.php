@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 90px;"> 

<h1>Editar Rol</h1>

<form action="{{ url('/roles/'.$rol["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('admin.roles.form', ['modo'=>'Editar'])
    

</form>
</div>
@endsection