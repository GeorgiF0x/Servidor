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
    <link rel="stylesheet" href="../../../css/style.css">

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
     <form action="" method="post" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
        <p>
            <span class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </span>
        <label for="idNombre">Nombre : <input type="text" placeholder="Nombre" name="Nombre" id="idNombre" " Value=<?php recuerda('Nombre')?> ></label><br><br>
        <span class="text-danger">
            <?php
                errores($errores,'Apellido');
            ?>
        </span>
            <label for="idApellido">Apellido : <input type="text" placeholder="Apellido" name="Apellido" id="idApellido"  Value=<?php recuerda('Apellido')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Contraseña');
                ?>
            </span>
            <label for="idContraseña">Contraseña : <input type="text" placeholder="Contraseña" name="Contraseña" id="idContraseña"  Value=<?php recuerda('Contraseña')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'repContraseña');
                ?>
            </span>
              <label for="idrepContraseña">Repetir Contraseña : <input type="text" placeholder="repContraseña" name="repContraseña" id="idrepContraseña"  Value=<?php recuerda('repContraseña')?>></label><br><br>
              <span class="text-danger">
                  <?php
                      errores($errores,'Fecha');
                  ?>
              </span>
            <label for="idFecha">Fecha : <input type="text" placeholder="dd/mm/yyy" name="Fecha" id="idFecha"  Value=<?php recuerda('Fecha')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'DNI');
                ?>
            </span>
            <label for="isDNI">DNI : <input type="text"  name="DNI" id="idDNI"  Value=<?php recuerda('DNI')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Email');
                ?>
            </span>
            <label for="Email">Correo Eletronico : <input type="text"  name="Email" id="idEmail" placeholder="correo@loquesea.com"  Value=<?php recuerda('Email')?>></label><br><br>
            
            <input type="file" name="Fichero" id="idfichero">
            <p class="text-danger">
                    <?php
                        errores($errores,'Fichero');
                    ?>
            </p>
        
        <p class="center">
            <!-- El boton Submit para verificar que se ha enviado el formulario -->
            <input type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Borrar" name="Borrar">
        </p>
        </p>
    <?php
    $ruta = $_SERVER['SCRIPT_FILENAME'];
    echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Codigo</a></div>";   
    ?>


<?php
        }
?>