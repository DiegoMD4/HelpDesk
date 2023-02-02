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
        <textarea style="resize: none" rows="8" class="form-control" type="text" name="descripcion" 
         id="decripcion" required>{{ isset($ticket["descripcion"])?$ticket["descripcion"]:'' }}</textarea> 

    {{-- <label for="nombre_usuario"> Nombre usuario </label>
        <input readonly="true" class="form-control" type="text" name="id_usuario" 
        value="{{ Auth::user()->id}}" id="id_usuario">
        
    <label for="area"> Area </label>
        <input readonly ="true" class="form-control" type="text" name="area" 
        value="{{Auth::user()->area->nombre_area}}" id="area"> --}}


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/ticket') }}">Atrás</a>