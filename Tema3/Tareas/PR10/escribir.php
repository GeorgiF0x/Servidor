<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
?>

<?php
    
    if(isset($_REQUEST['guardar'])&&!empty($_REQUEST['Texto'])){
            header("Location: ./leer.php");
    }
    elseif(isset($_REQUEST['volver'])){
            header("Location: ./seleccionar.php");
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

    <form action="" method="post" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data">
  
        <p>
        <input type="hidden" name="oculto" value=<?$_REQUEST['Nombre']?>>
        <textarea name="texto" id="idTexto" cols="300" rows="10">
            <?
            echo"<pre>";
                escribirFichero();
            ?>
        </textarea><br><br>
        
        </p>
        
        <p class="center">
            <input type="submit" value="Guardar" name="guardar" class="btn btn-dark">
            <input type="submit" value="Volver" name="guardar" class="btn btn-dark text-bold">
            
        </p>

    </form>



</body>
</html>