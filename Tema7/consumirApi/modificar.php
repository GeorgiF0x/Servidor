<?php
require './curl.php';
require './confApi.php';

if (isset($_REQUEST['modificar'])){
    $array = array();
    if (!empty($_REQUEST['nombre'])) $array['nombre'] = $_REQUEST['nombre'];
if (!empty($_REQUEST['localidad'])) $array['localidad'] = $_REQUEST['localidad'];
    if (!empty($_REQUEST['telefono'])) $array['telefono'] = $_REQUEST['telefono'];

   

put('institutos', $_REQUEST['id'],  $array);
}

?>


<h1>modificar</h1>
<form action="" method="post">
    <label for="id"><input type="number" name="id">id</label><br>
    <label for="nombre"><input type="text" name="nombre">Nombre</label><br>
    <label for="localidad"><input type="text" name="localidad">localidad</label><br>
    <label for="telefono"><input type="text" name="telefono">telefono</label><br>
    <input type="submit" value="modificar" name="modificar">
</form>

<a href="./">Volver</a>