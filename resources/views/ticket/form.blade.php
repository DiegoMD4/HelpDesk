<h2>Formulario</h2>

<label for="descripcion"> Descripcion </label>
        <input type="text" name="descripcion" 
        value="{{ isset($ticket["descripcion"])?$ticket["descripcion"]:'' }}" id="decripcion">
    <label for="nombre_usuario"> Nombre usuario </label>
        <input type="text" name="nombre_usuario" 
        value="{{ isset($ticket["nombre_usuario"])?$ticket["nombre_usuario"]:'' }}" id="nombre_usuario">
    <label for="estado"> Estado </label>
        <input type="text" name="estado" 
        value="{{ isset($ticket["estado"])?$ticket["estado"]:'' }}" id="estado">
    <label for="tecnicoasignado"> Tecnico Asignado </label>
        <input type="text" name="tecnico_asignado" 
        value="{{ isset($ticket["tecnico_asignado"])?$ticket["tecnico_asignado"]:'' }}" id="tecnico_asignado">
    <label for="area"> Area </label>
        <input type="text" name="area" 
        value="{{ isset($ticket["area"])?$ticket["area"]:'' }}" id="area">

        <input type="submit" value="Enviar Ticket">

        <a href="{{ url('/ticket') }}">Regresar</a>
