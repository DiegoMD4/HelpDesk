<h1>Create</h1>

<form action="{{ url('/ticket')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <label for="descripcion"> Descripcion </label>
        <input type="text" name="descripcion" id="decripcion">
    <label for="nombreusuario"> Nombre de usuario </label>
        <input type="text" name="nombre de usuario" id="nombreusuario">
    <label for="estado"> Estado </label>
        <input type="text" name="estado" id="estado">
    <label for="tecnicoasignado"> Tecnico Asignado </label>
        <input type="text" name="tecnico asignado" id="tecnicoasignado">
    <label for="area"> Area </label>
        <input type="text" name="area" id="area">

        <input type="submit" value="Enviar Ticket">
    
</form>
