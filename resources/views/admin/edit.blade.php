@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 90px;"> 

<h1>Editar Usuario</h1>

<form action="{{ url('/admin/'.$user["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('admin.form', ['modo'=>'Editar'])
</form>
</div>
@endsection