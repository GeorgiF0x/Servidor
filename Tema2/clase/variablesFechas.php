<?php
//diferenciar fecha de cliente y de servidor

// echo "<h1>con time()</h1>";

// echo "<h2>".time(). " segundos desde 1970<h/2>";

// //ver la zona en la que guarda los datos

// echo "<h1>Zona que tiene el servidor</h1>";

// echo "<h2>".date_default_timezone_set("Europe/Amsterdam"). " zona utc <h/2>";

// //funcion date

// echo "<h1>Date()</h1>";
// echo "<h2>".date("d/m/y h:i:s"). " <h/2>";

//PASAR DE STRING A TIME CON STRTOTIME()
echo "<p>Pasar de string  a fecha para pasar de fecha con formato a segundos</p>";
echo strtotime("21 August 1998")," ||21/08/1998 en segundos desde 1970". "\n";


$cumple=strtotime("21 August 1998");
$hoy=strtotime("now");
// echo "<p>".date("d/m/y",$cumple)."</p>";

$tiempoRestado=$hoy-$cumple;

echo "<p>".$tiempoRestado."</p>";

function calcularAnio($tiempoRestado){
    $SegundosAños =  60*60*24*365;
    $anios=$tiempoRestado/$SegundosAños;
     echo "<p>". $anios."</p>";
}

calcularAnio($tiempoRestado);

//DATETIME

$cumple= new DateTime('1998-08-21');
$hoy = new DateTime(); //sin argumentos es como poner now 
$intervalo= $cumple->diff($hoy);
echo "***********";

echo "<pre>";
print_r($intervalo);
echo "</pre>";

echo "<pre>";
print_r(getdate());
echo "</pre>";

