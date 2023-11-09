<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
    // Recupera el índice del campo a modificar
    $indiceModificar = isset($_GET['indice']) ? $_GET['indice'] : null;
?>
<?
       if (isset($_GET['guardar'])) {
           header("Location: ./notas.php");
           añadirCSV($_REQUEST['nombre'],$_REQUEST['ev1'],$_REQUEST['ev2'],$_REQUEST['ev3']);
    }
?>

<!DOCTYPE html>
<html lang="es">

<body>

<h1 class="text text-center">Modificar Notas</h1>
<div class="container">
    <form action="" method="get" class="mt-5 text-center mx-5 just" enctype="multipart/form-data">
    <label for="nombre">Nombre : </label><input type="text" name="nombre"  value=<?echo $indiceModificar?>><br><br>  
        <label for="ev1">Nota 1º Evaluacion : </label><input type="text" name="ev1" id=""><br><br>
        <label for="ev2">Nota 2º Evaluacion : </label><input type="text" name="ev2" id=""><br><br>
        <label for="ev3">Nota 3º Evaluacion : </label><input type="text" name="ev3" id=""><br><br>
        <input class='btn btn-dark' type='submit' name='guardar' value='Guardar cambios'>
    </form>
</div>

</body>
</html>
