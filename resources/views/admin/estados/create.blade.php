@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 30px;"> 

<h1>Crear Estado</h1>

<form action="{{ url('/estados') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('admin.estados.form' , ['modo'=>'Crear'])
    
    
</form>

</div>

@endsection