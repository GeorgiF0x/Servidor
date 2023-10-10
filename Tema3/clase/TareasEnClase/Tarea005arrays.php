<?php
        include("/var/www/Servidor/Fragmentos/header.html");
?>
<?php

    echo "<h1> Tarea005 </h1>";


echo "<p>1. Escribe un programa que dado un array ordénalo y devuelve otro array sin que haya
elementos repetidos </p>";

$array1=[2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
asort($array1);
$array1Norep=array_unique($array1);



foreach ($array1Norep as $key => $value) {
    echo " <pre>";
    echo $value;
    echo "</pre>";
};

echo "<p>2. Escribe un programa que dado un array devuelva la posición donde haya el valor 3 y
cambie el valor por el número de la posición</p>";

$array2 = [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];

$reemplazos = array(array_search(3,$array2) => $array2[array_search(3,$array2)]);

$array2Modificado = array_replace($array2, $reemplazos);
print_r($array2Modificado);

