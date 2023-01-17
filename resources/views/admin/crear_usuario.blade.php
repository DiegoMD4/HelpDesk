@extends('layouts.ADMIN')

@section('content1')
<div class="container" style="margin-top: 90px;"> 

<h1>Crear Usuario</h1>

<form action="{{ url('/user')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('ticket.form' , ['modo'=>'Mandar'])
    
    
</form>

</div>

@endsection