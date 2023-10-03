<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Saludos</title>
</head>
<body>
<?php
        //comentarios para acordarme 
   //cojer solo la clave sin valor , como se llaman igual salvo el valor cojera justo la que se ha pinchado
    $codigoIdioma = $_GET['codigo'];


    $saludo_es = '¡Hola en Español';
    $saludo_it = 'Ciao in Italiano';
    $saludo_de = 'Hallo auf Deutsch';
    $saludo_fr = 'Bonjour en Français';
    $saludo_ja = 'こんにちは';
    $saludo_ba = 'NaNaNaNaNa NaNaNa NaNaNaNaNaNa ¡Batman! (para tener banderas pares )';

    //  definir variable con el saludo  y concatenerla con el idioma que se ha pinchado
    $variableSaludo = 'saludo_' . $codigoIdioma;

    echo $$variableSaludo;
    

?>
</body>
</html>

