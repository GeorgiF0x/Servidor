<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
?>
     <h4>Subir fichero</h4>
     <!-- <form action="subir.php" method="post" class="mt-5 text-center"  enctype="multipart/form-data">
         <input type="file" name="fichero" id="idfichero">
         <input type="submit" value="Enviar" name="Enviar">
     </form> -->
     <form action="subir.php" method="post" enctype="multipart/form-data" class="mt-5 text-center">
  Enviar estos ficheros:<br />
  <input name="fichero[]" type="file" multiple /><br />
  <input type="date" name="fecha" id="">
  <input type="submit" value="Enviar" />
</form>
</body>
</html>