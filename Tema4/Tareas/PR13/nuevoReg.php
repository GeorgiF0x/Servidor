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

    // Si el formulario ha sido enviado y es válido
    if (enviado() && validaFormulario($errores)) {
        addRegistro();
        header("Location: ./index.php");
    } else {
    ?>

<main class="container mt-4">
            <!-- FORMULARIO -->
            <form action="" method="post">

                <div class="mb-3">
                    <label for="ejercicio" class="form-label">Ejercicio</label>
                    <input type="text" name="ejercicio" id="ejercicio" class="form-control" value="<?php recuerda('ejercicio'); ?>">
                    <?php printerror($errores, 'ejercicio'); 
                          printerror($errores, 'validarEjercicio');   ?>
                </div>

                <div class="mb-3">
                    <label for="repeticiones" class="form-label">Repeticiones</label>
                    <input type="number" name="repeticiones" id="repeticiones" class="form-control" value="<?php recuerda('repeticiones'); ?>">
                    <?php printerror($errores, 'repeticiones'); 
                          printerror($errores, 'validarRepeticiones'); ?>
                </div>

                <div class="mb-3">
                    <label for="series" class="form-label">Series</label>
                    <input type="number" name="series" id="series" class="form-control" value="<?php recuerda('series'); ?>">
                    <?php printerror($errores, 'series'); 
                          printerror($errores, 'validarSeries'); ?>
                </div>

                <div class="mb-3">
                    <input type="submit" value="Enviar" name="Enviar" class="btn btn-primary">
                    <input type="submit" value="Borrar Formulario" name="Borrar" class="btn btn-secondary">
                </div>
            </form>
        </main>
    <?php
    } // Cerramos el else
    ?>
        <?
        $ruta = $_SERVER['SCRIPT_FILENAME'];
        echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Codigo</a></div>";   
include("./Fragmentos/footer.html");
?>
</body>

</html>


