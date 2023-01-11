@if(count($errors)>0)


<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif

    <label  for="descripcion"> Descripcion </label>
        <textarea rows="8" class="form-control" type="text" name="descripcion" 
         id="decripcion">{{ isset($ticket["descripcion"])?$ticket["descripcion"]:'' }}</textarea> 
    <label for="nombre_usuario"> Nombre usuario </label>
        <input readonly="true" class="form-control" type="text" name="nombre_usuario" 
        value="{{ Auth::user()->name }}" id="nombre_usuario">
   {{--  <label for="estado"> Estado </label>
        <input class="form-control" type="text" name="estado" 
        value="{{ isset($ticket["estado"])?$ticket["estado"]:'' }}" id="estado">
    <label for="tecnicoasignado"> Tecnico Asignado </label>
        <input class="form-control" type="text" name="tecnico_asignado" 
        value="{{ isset($ticket["tecnico_asignado"])?$ticket["tecnico_asignado"]:'' }}" id="tecnico_asignado"> --}}
    <label for="area"> Area </label>
        <input readonly ="true" class="form-control" type="text" name="area" 
        value="{{Auth::user()->area }}" id="area">

<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/ticket') }}">Atrás</a>