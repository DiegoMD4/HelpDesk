@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif


<label for="area">Area</label>
    <input  class="form-control" type="text" name="area"  id="area">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Usuario">

        <a class="btn btn-secondary" href="{{ url('/areas') }}">Atrás</a>