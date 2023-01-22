@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 90px;"> 

<h1>Editar Area</h1>

<form action="{{ url('/area/'.$area["id"]) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}  
    @include('admin.areas.form', ['modo'=>'Editar'])
    

</form>
</div>
@endsection