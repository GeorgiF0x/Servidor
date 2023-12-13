<?php
    include("./Fragmentos/footer.html");
    include("./conexionBD.php");
    include("./funciones/funciones.php");
?>
<?php
            if (isset($_GET['modificar'])) {
              $indiceEliminar = $_GET['oculto'];
              eliminarRegistro($indiceEliminar);
          }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <table class="table border">
          <?
          imprimirTodo()
          ?>
    </table>
    <form action="post">
        <p>Nombre Ejercicio:<input type="text" name="NomEjer" id=""></p>
        <p>Repeticiones:<input type="number" name="Repes" id=""></p>
        <p>Series:<input type="number" name="Repes" id=""></p>
        <p>
            <input type="button" value="Borrar" name="">
            <input type="button" value="Consultar" name="">
            <input type="button" value="Modificar" name="">
        </p>
    </form>
</body>
