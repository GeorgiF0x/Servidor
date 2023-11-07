<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
    ?>
    <?php
    
            if(enviadoLeer()&&!empty($_REQUEST['Nombre'])){
                    header("Location: ./leer.php");
            }elseif(enviadoEscribir()&&!empty($_REQUEST['Nombre'])){
                    header("Location: ./escribir.php");
            }
            
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
        //     if(enviado() && validarFormulario($errores)){
        //     echo "<pre>";
        //     print_r($_REQUEST);
        // }else{
    ?>
    <form action="" method="post" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
  
        <p>
        <label for="idNombre">Nombre Fichero : <input type="text" placeholder="NombreFichero.ext" name="Nombre" id="idNombre"  ></label><br><br>
        
        </p>
        
        <p class="center">
            <input type="submit" value="Leer" name="Leer" class=" btn btn-dark">
            <input type="submit" value="Escribir" name="Escribir" class="btn btn-dark">
        </p>










    </form>
    <?
        // }
    ?>


</body>
</html>