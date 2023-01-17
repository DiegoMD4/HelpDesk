@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
   
    <div>
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif

<label for="name">Nombre usuario </label>
    <input  class="form-control" type="text" name="name"  id="name">
<label for="email">Correo</label>
    <input type="email" class="form-control" type="text" name="email"  id="email">
<label for="area">Area</label>
    <input  class="form-control" type="text" name="area"  id="area">
<label for="role">Role</label>
    <input  class="form-control" type="text" name="role"  id="role">
<label for="password">Contraseña</label>
    <input type="password"  class="form-control" type="text" name="password"  id="password">    
<label for="password-confirm">Confirmar contraseña</label>
    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
    @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
   @enderror
    

<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Usuario">

        <a class="btn btn-secondary" href="{{ url('/admin') }}">Atrás</a>