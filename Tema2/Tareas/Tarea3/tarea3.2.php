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
echo "<h1 class='text-center fw-bold fst-italic mt-3 mb-3'>Tarea 003 ejercicio 2 y 3</h1>";
print "<h3 class='ms-3'>Ejercicio 2</h3> ";
$variablePasada=$_GET['variable'];
print "<br>";
echo "<p class='fw-bold fst-italic ms-3'>la variable es  $variablePasada es de tipo ",gettype($variablePasada."</p>");
print "<br>";
echo  "***********************************************************************************************************************************************************************************************************";
$fechaEj3 = $_GET['anio'] . $_GET['mes'] . $_GET['dia'];
print "<h3 class='ms-3'>Ejercicio 3</h3> ";
echo "<p class='fw-bold fst-italic ms-3'>" . date('D d/m/Y', strtotime($fechaEj3)) . "</p>";



$ruta = $_SERVER['SCRIPT_FILENAME'];
echo "<div class='text-center mt-2'><a class='btn btn-dark text-white' href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Contenido</a></div>"; 

