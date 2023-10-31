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
     <form action="" method="get" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
        <p>
        <label for="idNombre">Nombre : <input type="text" placeholder="Nombre" name="Nombre" id="idNombre" pattern="[A-Za-z{3}]" Value=<?php recuerda('Nombre')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Nombre');
                ?>
            </span>
            <label for="idNombre">Apellido : <input type="text" placeholder="Apellido" name="Apellido" id="idApellido" pattern="[A-Za-z{3}]" Value=<?php recuerda('Apellido')?> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Apellido');
                ?>
            </span>
            <label for="idNombre">Contraseña : <input type="text" placeholder="Contraseña" name="Contraseña" id="idContraseña" pattern="[A-Za-z{3}]"> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'Contraseña');
                ?>
            </span>
              <label for="idNombre">Repetir Contraseña : <input type="text" placeholder="repContraseña" name="repContraseña" id="idrepContraseña" pattern="[A-Za-z{3}]"> ></label><br><br>
            <span class="text-danger">
                <?php
                    errores($errores,'repContraseña');
                ?>
            </span>
            <label for="hombre">Fecha : <input  type="date" name="fecha" id="" placeholder="dd/mm/yyyy" value=<?php recuerda('fecha')?>></label><br>
        </p>



<?php
        }
?>