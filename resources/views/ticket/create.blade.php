@extends('layouts.app')

@section('content')
<div class="container"> 

<h1>Crear ticket</h1>

<form action="{{ url('/ticket')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('ticket.form' , ['modo'=>'Crear']);
    
    
</form>

@endsection