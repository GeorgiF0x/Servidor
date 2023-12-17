

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">
    <title>Añadir Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include("./funciones/funciones.php");
    include("./funciones/validarFormulario.php");
    $errores = array();
    
    //Si ha ido todo bienb
    if (enviado() && validaFormulario($errores)) {
        modificaRegistro();
        header("Location: ./index.php");


    } else {




        ?>


<div class="container mt-3">
    <form action="" method="post">

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" name="id" id="id" value="<?php echo recuerda('id'); ?>" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="ejercicio" class="form-label">Ejercicio</label>
            <input type="text" name="ejercicio" id="ejercicio" value="<?php echo recuerda('ejercicio'); ?>" class="form-control">
            <?php printerror($errores, 'ejercicio'); ?>
        </div>

        <div class="mb-3">
            <label for="repeticiones" class="form-label">Repeticiones</label>
            <input type="number" name="repeticiones" id="repeticiones" value="<?php echo recuerda('repeticiones'); ?>" class="form-control">
            <?php printerror($errores, 'repeticiones'); ?>
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="number" name="series" id="series" value="<?php echo recuerda('series'); ?>" class="form-control">
            <?php printerror($errores, 'series'); ?>
        </div>

        <div class="mb-3">
            <input type="submit" value="Modificar" name="Modificar" class="btn btn-primary">
            <input type="submit" value="Borrar" name="Borrar" class="btn btn-danger">
        </div>

    </form>
</div>

      
            <?php
    } //Cerramos el else
    ?>
    </main>
    <?
include("./Fragmentos/footer.html");
?>

</body>

</html>