<?php
include("./Fragmentos/header.html");
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
    
    <div class="container mt-5">
    <form action="" method="get">
            <div class="mb-3">
                <p>
                    <input type="submit" class="btn btn-primary" name='imprimir' value="Imprimir Tabla">
                </p>
            </div>
            <div class="mb-3 input-group">
                <input type="text" class="form-control" name="buscar" id="" placeholder="Buscar Por id">
                <input name = 'botonBusca' type="submit" value="Buscar" class='btn btn-dark'>
                <input name = 'add' type="submit" value="Nuevo Registro" class='btn btn-success'>
            </div>
        </form>
    </div>
    <?php 
      if (isset($_REQUEST['add'])) {
        header('Location: ./nuevoReg.php');
      }
    if (isset($_GET['eliminar'])) {
        $idEliminar = $_GET['id'];
        eliminarRegistro($idEliminar);
    }
 if (isset($_REQUEST['imprimir'])) {
    imprimir(); 
 }

  if (isset($_REQUEST['botonBusca'])) {
      buscar($_REQUEST['buscar']); 
  }
  $ruta = $_SERVER['SCRIPT_FILENAME'];
    echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Codigo</a></div>";   

  include("./Fragmentos/footer.html");
 ?>

</body>

</html>

