<?

require('curl.php');
require('confiApi.php');



if (isset($_REQUEST['insertar'])) {

    $array = ['nombre' => $_REQUEST['nombre'], 'localidad' => $_REQUEST['localidad'], 'telefono' => $_REQUEST['telefono']];
    print_r($array);
    post('institutos', $array);
}
?>
<pre>
    <h1>insertar ciudades</h1>
<form action="" method="post">
    <label for="">nombre<input type="text" name="nombre" id=""></label>
    <label for="">localidad<input type="text" name="localidad" id=""></label>
    <label for="">telefono<input type="text" name="telefono" id=""></label>
    <label for=""><input type="submit" name="insertar" id=""></label>
</form>
</pre>