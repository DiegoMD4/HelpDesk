@extends('layouts.app')

@section('content')
<div class="container"> 

<h1>Edit</h1>

<form action="{{ url('/ticket/'.$ticket["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('ticket.form', ['modo'=>'Editar']);
    

</form>
</div>
@endsection