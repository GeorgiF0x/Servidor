<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
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

    <?php
            $errores= array ();
            //si todo va bien 
            if(enviado() && validarFormulario($errores)){
            echo "<pre>";
            print_r($_REQUEST);
        }else{
    ?>
    <!-- formularios para  enviar datos del cliente al servidor
            -action es para especificar donde mandar los datos,si no se especifica fichero llama la pagina actual
            -method es la forma metienda la que se mande los datos GET o POST segun queramos que aparezcan o no en la URL y ficheros solo POST
            -nombre , no es necesario para php 
            -enctype , es una propiedad para poder enviar ficheros
             -->
    <form action="" method="post" class="mt-5 text-center"  enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre: <input type="text" placeholder="Nombre" name="Nombre" id="idNombre" Value=<?php recuerda('Nombre')?>></label>
            <p class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </p>
            <label for="idNombre">Apellido: <input type="text" placeholder="Apellido" name="Apellido" id="idApellido" value=<?recuerda('Apellido')?>></label>
            <p class="text-danger">
            <?php
                    errores($errores,'Apellido');
                ?>
            </p>
        </p>

        <p>
            <label for="hombre">Hombre: <input <?php recuerdaRadio('genero','Hombre')?> type="radio" name="genero" id="" value= "Hombre">
        </label>
            <label for="mujer">Mujer: <input <?php recuerdaRadio('genero','Mujer')?>
             type="radio" name="genero" id="" value="Mujer"></label>
        </p>
        <p class="text-danger">
            <?php
                    errores($errores,'genero');
                    
                ?>
            </p>
        <p>
            <!--CHECKBOX para recoger los datos en arrays en la propiedad name se le añade [] para crear un array en este caso con aficiones
                 el valor que queremos que envie se pone en la etiqueta VALUE -->
            <h4>Aficiones</h4>
            <label for="hombre">Montar a caballo <input <?php recuerdaCheckBox('aficion','jinete') ?> type="checkbox" name="aficion[]" value="jinete" id=""></label><br> <!-- en name se añade[] porque no se sabe cuantos elementos del checkbox se van a recibir -->
                <label for="hombre">Fudbol <input <?php recuerdaCheckBox('aficion','fifas') ?> type="checkbox" name="aficion[]" id="" value="fifas"></label><br>
                <label for="hombre">Natacion <input <?php recuerdaCheckBox('aficion','Natacion') ?> type="checkbox" name="aficion[]" id="" value="Natacion"></label><br>      
        </p>
        <p class="text-danger">
                <?php
                    errores($errores,'aficion');
                ?>
            </p>
        <p>
            <!--FECHA formateada en año-mes-dia  -->
                <h4>Fechas</h4>
                <label for="hombre">Fecha de nacimiento <input  type="date" name="fecha_nacimiento" id="" value=<?php recuerda('fecha_nacimiento')?>></label><br>
        </p>
        <p class="text-danger">
                <?php
                    errores($errores,'fecha_nacimiento');
                ?>
            </p>
        <p>
            <!--SELECT para recoger el valor se recoge desde la propiedad Value  -->
                <h4>Equipos Balonesto</h4>
                <select name="equipos" id="">
                    <option value="0" <?php recuerdaSelect('equipos','0')?>>Seleccione una opcion</option>
                    <option value="Lakers" <?php recuerdaSelect('equipos','Lakers')?>>Lakers</option>
                    <option value="Celtics" <?php recuerdaSelect('equipos','Celtics')?>>Celtics</option>
                    <option value="Bulls" <?php recuerdaSelect('equipos','Bulls')?>>Bulls</option>
                </select>
        </p>
        <p class="text-danger">
                <?php
                    errores($errores,'equipos');
                ?>
            </p>
        <p>
        <p>
            <!-- Fichero recoge los datos en un fichero temporal , el fichero se ve desde la variable Files-->
                <h4>Subir fichero</h4>
                <input type="file" name="fichero" id="idfichero">
                <!-- El input hidden no se ve desde el cliente pero si recoge datos -->
                <input type="hidden" name="oculto" value="USUARIO007s">
        </p>
        <p class="text-danger">
                <?php
                    errores($errores,'fichero');
                ?>
            </p>
        <p class="center">
            <!-- El boton Submit para verificar que se ha enviado el formulario -->
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Borrar" name="Borrar">
        </p>
    </form>
    <?php
        }
    ?>
</body>
</html>