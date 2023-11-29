
<?php
include("./validaciones.php");
include("/var/www/Servidor/Fragmentos/header.html");
$generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../../css/style.css">
</head>
<body>
<?php
            $errores= array ();
            //si todo va bien 
            if(enviado() && validarFormulario2($errores)){
               BuscarEnXML($_REQUEST['Busca']);
        }else{
    ?>
<form action="" method="post" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
<span class="text-danger">
                <?php
                    errores($errores,'Busca');
                ?>
            </span>
            <label for="idPelicula">Titulo Buscar : <input type="text" placeholder="id pelicula" name="Busca" id="idPelicula" " Value=<?php recuerda('Busca')?> ></label><br><br>
            <p class="center">
            <!-- El boton Submit para verificar que se ha enviado el formulario -->
            <input type="submit" value="Enviar" name="Enviar">
        </p>
        </form>
    <?php
        }
    ?>
</body>
</html>