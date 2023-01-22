@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 90px;"> 

<h1>Editar Ticket</h1>

<form action="{{ url('/ticket/'.$ticket["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('ticket.form', ['modo'=>'Editar'])
    

</form>
</div>
@endsection