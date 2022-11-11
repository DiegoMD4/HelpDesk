<h1>Create</h1>

<form action="{{ url('/ticket')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @include('ticket.form');
    
</form>
