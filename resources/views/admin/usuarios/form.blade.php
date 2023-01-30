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
    <input  class="form-control" type="text" name="name"  id="name" value="{{ isset($user["name"])?$user["name"]:'' }}" required>
<label for="email">Correo</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email"  id="email" value="{{ isset($user["email"])?$user["email"]:'' }}" required>
    @error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
{{-- <label for="area">Area</label>
    <input  class="form-control" type="text" name="area"  id="area" value="{{ isset($user["area"])?$user["area"]:'' }}" required> --}}

    <br>

    <select required class="form-control" id="area" name="area">
        @foreach($areas as $area)
        <option class="form-control" id="area">{{$area["nombre_area"]}}</option>
        @endforeach
    </select>



<label for="role">Role</label>
    <input  class="form-control" type="text" name="role"  id="role" value="{{ isset($user["role"])?$user["role"]:'' }}" required>
<label for="password">Contraseña</label>
    <input type="password"  class="form-control @error('password') is-invalid @enderror" type="text" name="password"  id="password">  
    @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
   @enderror  
    <label for="password-confirm">Confirmar contraseña</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    
    

<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Usuario">

        <a class="btn btn-secondary" href="{{ url('/admin') }}">Atrás</a>