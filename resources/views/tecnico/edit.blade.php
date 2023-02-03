@extends('layouts.tecnico')

@section('content2')
<div class="container" style="margin-top: 90px;"> 

<h1>Editar Ticket</h1>

<form action="{{ url('/tecnico/'.$ticket["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('tecnico.form', ['modo'=>'Editar'])
    

</form>
</div>
@endsection