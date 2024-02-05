<?php
    require './curl.php';
    require './confApi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="./insertar.php">Insertar</a>
<a href="./modificar.php">Modificar</a>
<a href="./delete.php">borrar</a>
<h1>Listar institutos</h1>

<?php
$institutos = get('institutos');
$institutos = json_decode($institutos, true);


?>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Localidad</th>
        <th>Telefono</th>

    </tr>
<?php
foreach ($institutos as $instituto) {
    echo "<tr>";
    echo "<td>".$instituto['id']."</td>";
    echo "<td>".$instituto['nombre']."</td>";
    echo "<td>".$instituto['localidad']."</td>";
    echo "<td>".$instituto['telefono']."</td>";
    echo "</tr>";
}
?>
</table>


</body>
</html>