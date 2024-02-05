<?php
require './curl.php';
require './confApi.php';

if (isset($_REQUEST['insertar'])){
    $array = array(
        'nombre' => $_REQUEST['nombre'],
        'localidad' => $_REQUEST['localidad'],
        'telefono' => $_REQUEST['telefono']
    );

post('institutos', $array);
}

?>


<h1>Insertar</h1>
<form action="" method="post">
    <label for="nombre"><input type="text" name="nombre">Nombre</label><br>
    <label for="localidad"><input type="text" name="localidad">localidad</label><br>
    <label for="telefono"><input type="text" name="telefono">telefono</label><br>
    <input type="submit" value="insertar" name="insertar">
</form>

<a href="./">Volver</a>