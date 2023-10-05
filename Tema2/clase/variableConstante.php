<?php
//para crear Constante en ficheros , se usa desde cualquier sitio
define("USER","Maria");
echo USER;

//para  poner una Constante dentro de una clase se usa el const , se usa dentro de la clase 

const test = 'foobar!';


//Inclusion de ficheros

//  include(); Si no encuentra el fichero saldra un warning pero ejecuta
//  require();  Si no encuentra el fichero saldra un error y NO ejecuta

$ruta=$_SERVER['PHP_SELF'].$SERVER['DOCUMENT_ROOT'];

echo "<a href=verCodigo.php?ruta=".$ruta.">BOTON PARA VER CODIGO</a>";