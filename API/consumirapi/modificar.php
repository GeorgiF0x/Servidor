<?

require('curl.php');
require('confiApi.php');



if (isset($_REQUEST['modificar'])) {
    $array = [];

    if (!empty($_REQUEST['nombre'])) {
        $array['nombre'] = $_REQUEST['nombre'];
    }

    if (!empty($_REQUEST['localidad'])) {
        $array['localidad'] = $_REQUEST['localidad'];
    }

    if (!empty($_REQUEST['telefono'])) {
        $array['telefono'] = $_REQUEST['telefono'];
    }

    put('institutos', $array);
    // delete('institutos');S
}
?>
<pre>
    <h1>insertar ciudades</h1>
<form action="" method="post">
    <label for="">id<input type="text" name="id" id=""></label>
    <label for="">nombre<input type="text" name="nombre" id=""></label>
    <label for="">localidad<input type="text" name="localidad" id=""></label>
    <label for="">telefono<input type="text" name="telefono" id=""></label>
    <label for=""><input type="submit" name="modificar" id=""></label>
</form>
</pre>