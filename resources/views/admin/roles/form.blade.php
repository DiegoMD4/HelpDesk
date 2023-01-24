@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif


<label for="nombre_rol">Rol</label>
    <input class="form-control" type="text" name="nombre_rol"  id="nombre_rol">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} rol">

        <a class="btn btn-secondary" href="{{ url('/roles') }}">Atrás</a>