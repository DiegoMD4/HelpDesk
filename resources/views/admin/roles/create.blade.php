@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 30px;"> 

<h1>Crear rol</h1>

<form action="{{ url('/roles')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('admin.roles.form' , ['modo'=>'Crear'])

</form>

</div>

@endsection