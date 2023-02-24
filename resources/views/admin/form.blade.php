<div class="card-body">
        <div class="form-group">
            <strong>id de ticket:</strong>
            {{ $ticket->id}}
        </div>
        <div class="form-group">
            <strong>Descripcion:</strong>
            {{ $ticket->descripcion }}
        </div>
        <div class="form-group">
            <strong>Estado:</strong>
            {{ $ticket->estado->tipo_estado }}
        </div>
        <div class="form-group">
            <strong>Area:</strong>
            {{ $ticket->user->area->nombre_area }}
        </div>
        <div class="form-group">
            <strong>Fecha de envio:</strong>
            {{ $ticket->created_at }}
        </div>
        
        <div class="form-group">
           <strong> {{ Form::label('Tecnico:') }} </strong>
            {{ Form::select('tecnico_asignado', $user->name, ['class' => 'form-control' . ($errors->has('tecnico_asignado') ? ' is-invalid' : ''), 'placeholder' => 'Asignar técnico']) }}
            {!! $errors->first('tecnico_asignado', '<div class="invalid-feedback">:message</div>') !!}
        </div> 


        <input type="hidden" name="id_estado" value="3" id="id_estado">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/entrada') }}">Atrás</a>


</div>