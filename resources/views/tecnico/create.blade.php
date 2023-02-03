@extends('layouts.tecnico')

@section('content2')
<div class="container" style="margin-top: 90px;"> 

<h1>Crear ticket</h1>

<form action="{{ url('/tecnico')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('tecnico.form' , ['modo'=>'Mandar'])
    
    
</form>

</div>

@endsection