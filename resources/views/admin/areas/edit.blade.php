@extends('layouts.admin')
@section('content1')
<div class="container container-fluid"> 

<h1>Editar Area</h1>

<form action="{{ url('/areas/'.$area["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('admin.areas.form', ['modo'=>'Editar'])
    

</form>
</div>
@endsection