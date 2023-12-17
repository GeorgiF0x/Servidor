<?php
include("./Fragmentos/footer.html");
include("./funciones/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

      if (isset($_REQUEST['add'])) {
        header('Location: ./add.php');
      }
      
      
      ?>
    <div class="container mt-5">
    <form action="" method="get">
            <div class="mb-3">
                <p>
                    <input type="submit" class="btn btn-primary" name='imprimir' value="Imprimir Tabla">
                </p>
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control" name="buscar" id="" placeholder="Buscar Por DNI">
                <input name = 'botonBusca' type="submit" value="Buscar" class='btn btn-dark'>
                <input name = 'add' type="submit" value="Nuevo Registro" class='btn btn-success'>
            </div>
        </form>
    </div>
    <?php 
    //   if (!empty($_REQUEST['eliminar'])) {
    //     eliminarRegistro($_REQUEST['DNI']);
    //     leerTabla();
    //   }
 if (isset($_REQUEST['imprimir'])) {
    imprimir(); 
 }

//   if (isset($_REQUEST['botonBusca'])) {
//       buscarPorDNI($_REQUEST['busca']); 
//   }
 ?>

</body>

</html>

