@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif


<label for="tipo_estado">Estados</label>
    <input class="form-control" type="text" name="tipo_estado"  id="tipo_estado">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Estado">

        <a class="btn btn-secondary" href="{{ url('/estados') }}">Atrás</a>