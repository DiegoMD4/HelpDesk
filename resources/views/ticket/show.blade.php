@extends('layouts.app')

@section('template_title')
    {{ $ticket->name ?? 'Show Ticket' }}
@endsection

@section('content')
<div class="container" style="margin-top: 90px;  max-width: 90%; "> 
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ticket.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $ticket->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Id Estado:</strong>
                            {{ $ticket->id_estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection
