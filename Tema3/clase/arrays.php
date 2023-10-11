<?php


$arrayNum=array(10);

print_r($arrayNum);
echo "<br>";
$array= array("lunes","martes","miercoles");
print_r($array);
echo "<br>";
$array2= array("lunes",2,"miercoles");
var_dump(print_r($array2));

$arrayCorta=['lunes','martes','miercoes'];
echo "<br>";
var_dump(print_r($arrayCorta));


echo "<h2>Crear arrays de forma estatica</h2>";


$semana= array("lunes","martes","miercoles","jueves","viernes");

$semana[5]="sabado";

// for ($i=0; $i <count($semana) ; $i++) { 
//     echo "<br>".$semana[$i];
// }
echo "<br>";
foreach ($semana as $key => $value) {
     echo "<pre>";
     echo var_dump($value)."<br>";
     echo "</pre>";
}
echo "<br>";
print_r(array_keys($semana));


echo "<h2>Arrays Asociativos</h2>";

//para recorrer arrays asociativos se usa foreach usando clave y valor

$notas=array("smail"=>10,"mario"=>9,"manuel"=>"sobre Saliennte");

foreach ($notas as $key => $value) {
    echo "<pre>";
    echo "<br> La nota de ".$key."es :".$value;
    echo "</pre>";
};

echo "<h2>Arrays Multiples</h2>";

//asociativo
$arrayDAW=array("DWES"=>"prog servidor","DIW"=>"deseño de interfaces");
$arrayDAM=array("PROG"=>"prog DAM","PSP"=>"PSP DAM");
$arrayASIR=array("ISO"=>"ISO RED","RED"=>"red ASIR");
$ciclos=array("DAM"=>$arrayDAM,"DAW"=>$arrayDAW,"ASIR"=>$arrayASIR); //ARRAY numerico valor 1=daw valor 2=dam valor 3= asir

echo "<pre>";
print_r($ciclos);
echo "</pre>";

//RECORRER ARRAYS ASOCIATIVOS


foreach ($ciclos as $key => $value) {
    echo "<br> el ciclo de $key tiene las asignaturas :";
    foreach ($value as $siglas => $NombreAsignatura) {
        echo "<br> $siglas : $NombreAsignatura";
    }
}

echo "<h2>Funciones de arrays</h2>";
// reset($ciclos);
// while (current($ciclos)) {
//     echo "<pre>";
//     echo "el ciclo ".key($ciclos). " tiene las asignaturas";
//     $ciclo=current($ciclos);

//     while (current($ciclo)) {
//         echo "<br> -". key($ciclo)- " : ". current($ciclo);
//         next($ciclo);
//     }
//     next($ciclos);
//     echo "</pre>";
//     echo "<br>";
// }



// Encuentra el ancho máximo para alinear correctamente la matriz
$ancho_maximo = strlen(end(end($matriz)));

