<?php
    include("./validaciones.php")

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
        if(enviado()){
            if(textVacio('Nombre')){
               $errores['Nombre']="Nombre esta vacio";
            }
            if(textVacio('Apellido')){
                $errores['Apellido']="Apellido esta Vacio";
            }
        }
     
    ?>

    <form action="" method="post" class="mt-5 text-center"  enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre: <input type="text" placeholder="Nombre" name="Nombre" id="idNombre"></label>
            <p class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </p>
            <label for="idNombre">Apellido: <input type="text" placeholder="Apellido" name="Apellido" id="idApellido"></label>
            <p class="text-danger">
            <?php
                    errores($errores,'Apellido');
                ?>
            </p>
        </p>
        <p>
            <label for="hombre">Hombre: <input type="radio" name="genero" id="" value=
            <?php
            recuerda('genero')
            ?>></label>
            <label for="mujer">Mujer: <input type="radio" name="genero" id="" value="Mujer"></label>
        </p>
        <p>
            <h4>Aficiones</h4>
            
            <label for="hombre">Montar a caballo <input type="checkbox" name="aficion[]" value="jinete" id=""></label><br> <!-- en name se añade[] porque no se sabe cuantos elementos del checkbox se van a recibir -->
                <label for="hombre">Fudbol <input type="checkbox" name="aficion[]" id="" value="fifas"></label><br>
                <label for="hombre">Natacion <input type="checkbox" name="aficion[]" id="" value="Natacion"></label><br>      
        </p>
        <p>
                <h4>Fechas</h4>
                <label for="hombre">Fecha de nacimiento <input type="date" name="fecha_nacimiento" id=""></label><br>
        </p>
        <p>
                <h4>Equipos Balonesto</h4>
                <select name="equipos" id="">
                    <option value="0">Seleccione una opcion</option>
                    <option value="Lakers">Lakers</option>
                    <option value="Celtics">Celtics</option>
                    <option value="Bulls">Bulls</option>
                </select>
        </p>
        <p>
                <h4>Subir fichero</h4>
                <input type="file" name="fichero" id="idfichero">
                <input type="hidden" name="HIDDEn" value="USUARIO007s">
        </p>
        <p class="center">
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Borrar" name="Borrar">
        </p>
    </form>
</body>
</html>