@extends('layouts.app')

@section('template_title')
    {{ $ticket->name ?? 'Show Ticket' }}
@endsection

@section('content')
<div class="container" style="margin-top: 50px;  max-width: 98%; "> 
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class=" card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title"><h2>Detalle del Ticket</h2></span>
                        </div>
                        <div class="float-left">
                            <a class="btn btn-primary flex" href="{{ route('ticket.index') }}">Volver</a>
                        </div>
                    </div>

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

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection
