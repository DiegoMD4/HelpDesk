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

    <label for="nombre_usuario"> Id de usuario: </label>
    <label >{{ Auth::user()->id}}</label>
        <br>
        <label > Nombre de usuario: </label>
        <label >{{ Auth::user()->name}}</label>
<br>
<label > Tecnico asignado: </label>
<label >
@if( $modo == "Editar")

    <input type="text" class="form-control-plaintext" name="tecnico_asignado" id="tecnico_asignado"
     value="{{ isset($ticket["tecnico_asignado"])?$ticket["tecnico_asignado"]:'' }}" readonly="true">
@else
<label >Pendiente</label>
@endif
</label>
<br>
        <input class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/ticket') }}">Atrás</a>