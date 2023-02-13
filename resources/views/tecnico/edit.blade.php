@extends('layouts.tecnico')

@section('content2')
<div class="container" style="margin-top: 90px;"> 
    <div class="card">
        <div class="card-header">
<h1>Detalle Ticket</h1>
        </div>
<form action="{{ url('/tecnico/'.$ticket["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('tecnico.form', ['modo'=>'Aceptar'])
    

</form>
</div>
@endsection