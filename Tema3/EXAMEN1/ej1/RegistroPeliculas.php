
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
            if(enviado() && validarFormulario($errores)){
                crearXML();
        }else{
    ?>
     <form action="" method="post" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
        <p>
            <span class="text-danger">
                <?php
                    errores($errores,'idPeli');
                ?>
            </span>
            <label for="idPelicula">IDPelicula : <input type="text" placeholder="id pelicula" name="idPeli" id="idPelicula" " Value=<?php recuerda('idPeli')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Titulo');
                ?>
            </span>
            <label for="Titulo">Ttitulo Pelicula : <input type="text" placeholder="Titulo Pelicula" name="Titulo" id="idTitulo" " Value=<?php recuerda('Titulo')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Director');
                ?>
            </span>
            <label for="Director">Director Pelicula : <input type="text" placeholder="Director Peli" name="Director" id="idDirector" " Value=<?php recuerda('Director')?> ></label><br><br>
            <span class="text-danger">
                  <?php
                      errores($errores,'Fecha');
                  ?>
              </span>
            <label for="idFecha">Año de lanzamiento : <input type="text" placeholder="yyyy" name="Fecha" id="idFecha"  Value=<?php recuerda('Fecha')?> ></label><br><br>
            <?
            crearRadioButon();
            ?>
            <span class="text-danger">
                <?php
                    errores($errores,'Duracion');
                ?>
            </span>
            <label for="Duracion">Duracion Pelicula : <input type="text" placeholder="Duracion hh:mm:ss" name="Duracion" id="idDuracion" " Value=<?php recuerda('Duracion')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Duracion');
                ?>
            </span>
            <label for="ActPrincipales">Actores Principales: <input type="text" placeholder="Actores Principales" name="ActPrincipales" id="idActPrincipales" " Value=<?php recuerda('ActPrincipales')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Sinopsis');
                ?>
            </span>
            <label for="Sinopsis">Sinopsis: <textarea name="Sinopsis" id="IdSinopsis" cols="40" rows="5" ><?php recuerda('Sinopsis')?></textarea>></label><br><br>
           
            <p class="center">
            <!-- El boton Submit para verificar que se ha enviado el formulario -->
            <input type="submit" value="Enviar" name="Enviar">

        </p>
            <?php
        }
    ?>


