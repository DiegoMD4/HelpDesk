@extends('layouts.admin')

@section('content1')
<div class="container content-fluid"> 

<h1>Crear Area</h1>

<form action="{{ url('/areas')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('admin.areas.form' , ['modo'=>'Crear'])

</form>

</div>

@endsection