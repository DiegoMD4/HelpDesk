@if(count($errors)>0)


<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif

<label for="nombre_usuario"> Nombre usuario </label>
    <input  class="form-control" type="text" name="nombre_usuario"  id="nombre_usuario">
    

<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/admin') }}">Atrás</a>