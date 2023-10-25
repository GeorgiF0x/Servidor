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
    <form action="" method="get" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
        <!-- campos text -->
        <p>
            <label for="idNombre">Alfabetico : <input type="text" placeholder="Nombre" name="Nombre" id="idNombre" pattern="[A-Za-z]" Value=<?php recuerda('Nombre')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </span>
            <label for="idNombreOpc">Alfabetico Opcional : <input type="text" placeholder="Nombre Opcional" name="NombreOpc" pattern="[A-Za-z]" id="idApellido" value=<?recuerda('NombreOpc')?>></label><br><br>

            <label for="idApellido">Alfanumerico : <input type="text" placeholder="Apellido" name="alfaNum" id="idApellido" Value=<?php recuerda('alfaNum')?>></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'alfaNum');
                ?>
            </span>
            <label for="idApellido">Alfanumerico Opcional : <input type="text" placeholder="Apellido" name="alfaNumOpc" id="idApellido" Value=<?php recuerda('alfaNumOp')?>></label><br><br>
            <label for="idNumerico">Numerico : <input type="number" name="numerico" id="idNumerico" placeholder="Numerico" value=<?php recuerda('Numerico')?>></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </span>
            <label for="idNumerico">Numerico Opcional : <input type="number" name="numericoOpc" id="idNumerico" placeholder="Numerico" value=<?php recuerda('NumericoOpc')?>></label><br><br>
            <!-- campos fecha -->
            <label for="hombre">Fecha : <input  type="date" name="fecha" id="" value=<?php recuerda('fecha')?>></label><br>
            <span class="text-danger">
                <?php
                    comprobarEdad('fecha');
                ?>
            </span>
            <label for="hombre">Fecha : <input  type="date" name="fechaOpc" id="" value=<?php recuerda('fechaOpc')?>></label><br>
            <label for="hombre">Opcion 1: <input <?php recuerdaRadio('genero','Hombre')?> type="radio" name="opcion" id="" value= "opcion1">
        </label>
            <label for="opcion2">Opcion 2: <input <?php recuerdaRadio('opcion','opcion2')?>
             type="radio" name="opcion" id="" value="opcion2"></label>
             <label for="opcion3">Opcion 3: <input <?php recuerdaRadio('opcion','opcion3')?>
             type="radio" name="opcion" id="" value="opcion2"></label>
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