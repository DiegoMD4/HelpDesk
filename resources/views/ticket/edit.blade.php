<h1>Edit</h1>

<form action="{{ url('/ticket/'.$ticket->id) }}" method="post" enctype="multipart/form-data"></form>
@csrf
{{ method_field('PATCH') }}
@include('ticket.form');