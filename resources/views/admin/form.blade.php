<div class="card-body">
        <div class="form-group">
            <strong>ID de ticket:</strong>
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
        
         
            <strong> {{ Form::label('Tecnico:') }} </strong>
            <select class="form-select" name="tecnico_asignado" id="tecnico_asignado">
                
                @foreach ($users as $user)
                    <option> {{$user->name}} </option>
                @endforeach
            </select> <br>
         


        <input type="hidden" name="id_estado" value="3" id="id_estado">


<br>
        <input  class="btn btn-primary" type="submit" value="{{$modo}} Ticket">

        <a class="btn btn-secondary" href="{{ url('/entrada') }}">Atrás</a>


</div>