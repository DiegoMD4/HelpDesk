@if(count($errors)>0)

<div class="alert alert-danger d-flex align-items-center" role="alert">
    @foreach($errors->all() as $error) 
      <li>  {{ $error }} </li>
    @endforeach
    </div>
</div>
@endif
   <div class="container-fluid card" style="max-width: 90%;">
        
            <div class="card-body">

                <label for="name">Nombre usuario </label>
                <input  class="form-control" type="text" name="name"  id="name" value="{{ isset($user["name"])?$user["name"]:'' }}" required>
            <label for="email">Correo</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email"  id="email" value="{{ isset($user["email"])?$user["email"]:'' }}" required>
                @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            
            
                <div class="form-group">
                    {{ Form::label('id_area') }}
                    {{ Form::select('id_area', $areas, $user->id_area, ['class' => 'form-control' . ($errors->has('id_area') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un area']) }}
                    {!! $errors->first('id_area', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {{ Form::label('id_rol') }}
                    {{ Form::select('id_rol', $roles, $user->id_rol, ['class' => 'form-control' . ($errors->has('id_rol') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un Rol']) }}
                    {!! $errors->first('id_rol', '<div class="invalid-feedback">:message</div>') !!}
                </div> 
                
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
            </div>
   </div>
    <div>
    
