<?php
include("/var/www/Servidor/Fragmentos/header.html");
?>

<nav class="navbar navbar-expand-lg justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item ">
            <a href="./tarea3.1.php" class="btn btn-dark text-white">Ejercicio 1</a>
        </li>
        <li class="nav-item mx-3">
            <a href="./pagina3.2.php" class="btn btn-dark text-white">Ejercicio 2, 3 y 4</a>
        </li>
    </ul>
</nav>

<?php
echo "<h1 class='text-center fw-bold fst-italic mt-3 mb-3'>Tarea 003 ejercicio 4</h1>";

$cumple1 = $_GET['c1anio'] . $_GET['c1mes'] . $_GET['c1dia'];
$cumple2 = $_GET['c2anio'] . $_GET['c2mes'] . $_GET['c2dia'];

echo "<p class='fw-bold fst-italic ms-3'>" ."Fecha cumple 1: ". date('D d/m/Y', strtotime($cumple1)) . "</p>";

echo "<p class='fw-bold fst-italic ms-3'>" ."Fecha cumple 2: ". date('D d/m/Y', strtotime($cumple2)) . "</p>";


$cumple1 = "1998-08-21"; // con get tendria que concatener cada variable recogida con - para el srtotime
$cumple2 = "1980-02-10"; 

function calcularDiferenciaAnios($fecha1, $fecha2) {
    $anio1 = date('Y', strtotime($fecha1));
    $anio2 = date('Y', strtotime($fecha2));

    $diferencia = $anio2 - $anio1;

    return $diferencia;
}


$diferenciaAnios = calcularDiferenciaAnios($cumple2, $cumple1);

echo "<p class='fw-bold fst-italic ms-3'>Diferencia en años: $diferenciaAnios años</p>";

$ruta = $_SERVER['SCRIPT_FILENAME'];
echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Contenido</a></div>";  

