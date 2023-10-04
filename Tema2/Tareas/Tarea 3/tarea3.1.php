<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p  {
            margin-left:5%;
        }
        .tarea2{
            margin-left:45%;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
include("/var/www/Servidor/Fragmentos/header.html");

echo "<h1 class='text-center fw-bold fst-italic mt-3 mb-3'>Tarea 003</h1>";

echo "<p class=fw-bold fst-italic>";
echo "a. Muestra el nombre del fichero que se está ejecutando.<br>";
echo $_SERVER['PHP_SELF'];
echo "</p >";

echo "<p class=fw-bold fst-italic>";
echo "b. Muestra la dirección IP del equipo desde el que estás accediendo.<br>"; 
echo $_SERVER['SERVER_ADDR'];
echo "</p>";

echo "<p class=fw-bold fst-italic>";
echo "C. Muestra el path donde se encuentra el fichero que se está ejecutando.<br>"; 
echo $_SERVER['REQUEST_URI'];
echo "</p >";

echo "<p class=fw-bold fst-italic>";
echo "d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18.<br>"; 
echo date("y/m/d h:m:s");
echo "</p class=fw-bold fst-italic>";

echo "<p class=fw-bold fst-italic>";
echo "e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de
mes de año, hh:mm:ss , Zona horaria). <br>"; 
date_default_timezone_set("Europe/Lisbon");
echo date("D j/F/Y h:m:s" ) ." ".date_default_timezone_get();
echo "</p >";

echo "<p class=fw-bold fst-italic>";
echo "f. Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy
de tu cumpleaños <br>"; 
echo "<p class=fw-bold fst-italic>en timestamp<br>";
echo strtotime("21 August 1998");
echo "</p >";

echo "<p class=fw-bold fst-italic>en dd/mm/yyyy<br>";
$cumpleDia=date(strtotime("21 August 1998"));
echo date("d/m/y", $cumpleDia);
echo "</p >";
echo "</p >";

echo "<p class=fw-bold fst-italic>";
echo "g. Calcular la fecha y el día de la semana de dentro de 60 días. <br>";

echo date("d/m/y D", strtotime("+60 day"));
echo "</p >";


echo " <a href='./tarea3.2.php' class='btn btn-dark text-white center tarea2'>Ir a apartado 2</a>";






