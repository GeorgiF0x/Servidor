<?php
include("/var/www/Servidor/Fragmentos/header.html");
echo "<h1 class='text-center fw-bold fst-italic mt-3 mb-3'>Tarea 003</h1>";

$variablePasada=$_GET['variable'];
print "<br>";
echo "<p class='fw-bold fst-italic'>la variable es  $variablePasada es de tipo ",gettype($variablePasada."</p>");
