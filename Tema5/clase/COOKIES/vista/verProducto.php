<?php
require("../funciones/funcionesBD.php");
require("../funciones/funciones.php");
    if(!isset($_REQUEST['id'])){
        header("Location: home.php");
    }else{

    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=+, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?
            $producto=findById($_REQUEST['id']);
            echo "<h1>".$producto['nombre']."</h1>";
            echo "<h3>".$producto['descripcion']."</h3>";
            echo "<img src='../".$producto['baja']."'>";
            insertarCookie();
            echo "<br>";
            echo "<a href='./home.php'>volver</a><br>";
        ?>
    </body>
    </html>