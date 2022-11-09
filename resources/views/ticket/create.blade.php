<h1>Create</h1>

<form action="{{ url('/ticket')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <label for="descripcion"> Descripcion </label>
        <input type="text" name="descripcion" id="decripcion">
    <label for="nombre_usuario"> Nombre usuario </label>
        <input type="text" name="nombre_usuario" id="nombre_usuario">
    <label for="estado"> Estado </label>
        <input type="text" name="estado" id="estado">
    <label for="tecnicoasignado"> Tecnico Asignado </label>
        <input type="text" name="tecnico_asignado" id="tecnico_asignado">
    <label for="area"> Area </label>
        <input type="text" name="area" id="area">

        <input type="submit" value="Enviar Ticket">
    
</form>
