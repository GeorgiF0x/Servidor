<?php
   include("./funciones/funciones.php");
   include("./funciones/validarFormulario.php");

   if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $ejercicio = $_POST['ejercicio'];
    $repeticiones = $_POST['repeticiones'];
    $series = $_POST['series'];
    aplicarModificar($id, $ejercicio, $repeticiones, $series);
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Modificar Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <form action="" method="post">
        <div class="mb-3">
    <label for="id" class="form-label">ID</label>
    <input type="number" name="id" id="id" value="<?php echo isset($_REQUEST['id']) ? htmlspecialchars($_REQUEST['id']) : ''; ?>" class="form-control" readonly>
</div>

<div class="mb-3">
    <label for="ejercicio" class="form-label">Ejercicio</label>
    <input type="text" name="ejercicio" id="ejercicio" value="<?php echo isset($_REQUEST['ejercicio']) ? htmlspecialchars($_REQUEST['ejercicio']) : ''; ?>" class="form-control">
</div>

<div class="mb-3">
    <label for="repeticiones" class="form-label">Repeticiones</label>
    <input type="number" name="repeticiones" id="repeticiones" value="<?php echo isset($_REQUEST['repeticiones']) ? htmlspecialchars($_REQUEST['repeticiones']) : ''; ?>" class="form-control">
</div>

<div class="mb-3">
    <label for="series" class="form-label">Series</label>
    <input type="number" name="series" id="series" value="<?php echo isset($_REQUEST['series']) ? htmlspecialchars($_REQUEST['series']) : ''; ?>" class="form-control">
</div>

            <div class="mb-3">
                <input type="submit" value="Modificar" name="modificar" class="btn btn-primary">
            </div>
        </form>
    </div>
    <?
    $ruta = $_SERVER['SCRIPT_FILENAME'];
    echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Codigo</a></div>";      
    ?>
</body>

</html>

