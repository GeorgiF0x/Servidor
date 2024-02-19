<?php
require('./config/confi.php');
session_start();
require CON . 'LoginController.php';

if(validado()){
    require $_SESSION['vista'];
}

print_r($_SESSION['vista']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  

<form action="" method="post">
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value=<?
      if(isset($_COOKIE['recordar'])){
        echo $_COOKIE['recordar']['nombre'];
      }  
    ?>></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "nombre");
        }
        ?>
    </p>
    <label for="password">Contraseña: <input type="password" name="pass" id="pass" value=<?
           if(isset($_COOKIE['recordar'])){
            echo $_COOKIE['recordar']['pass'];
          }  
    ?>></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "pass");
        }
        ?>
    </p>
    <div>
    <input type="checkbox" id="recordar" name="recordar" <?php if(isset($_COOKIE['nombre']) && isset($_COOKIE['pass'])) echo "checked"; ?>>
        <label for="recordar">Recordar sesión</label>
    </div>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "validado");
        }
        ?>
    </p>
    <input type="submit" name="login" value="Iniciar">
</form>


</body>
</html>
