@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;"> 

<h1>Crear ticket</h1>

<form action="{{ url('/ticket')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('ticket.form' , ['modo'=>'Mandar']);
    
    
</form>

</div>

@endsection