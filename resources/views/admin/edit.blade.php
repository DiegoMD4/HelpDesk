@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 90px;"> 
    <div class="card">
        <div class="card-header">
<h1>Detalle Ticket</h1>
        </div>
<form action="{{ url('/entrada/'.$ticket["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('admin.form', ['modo'=>'Asignar'])
    

</form>
</div>
@endsection