@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif


<label for="nombre_area">Area</label>
    <input class="form-control" type="text" name="nombre_area"  id="nombre_area">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Area">

        <a class="btn btn-secondary" href="{{ url('/areas') }}">Atrás</a>