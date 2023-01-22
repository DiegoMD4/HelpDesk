@extends('layouts.admin')

@section('content1')
<div class="container" style="margin-top: 30px;"> 

<h1>Crear Area</h1>

<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('admin.areas.form' , ['modo'=>'Mandar'])
    
    
</form>

</div>

@endsection