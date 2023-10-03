<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduccion tema 2 en clase</title>
</head>
<body>
    <?php
        echo"hola mundo";
        print "hola mundo";
        //para arrays print_r
        print  "<br>";

        print "<p> informacion de var_dumb";
        print "<br>";
        var_dump("georgi"); //VAR_DUMB DEVUELVE INFORMACION DE LA VARIABLE , TIPO , TAMAÑO ETC
        print "<br>";
        var_dump(3);

        //TIPOS DE VARIABLES
        
        //declaracion e variables

        print "<p> tipos de varibles";
        $miVariable = 21;
        print "<br>";
        echo "la variable es  $miVariable es de tipo ",gettype($miVariable); //gettipe para ver de que tipo es la varible int,string,booleana etc

        print "<br>";
        
        $miVariable=6.5;

        print "<br> El raro de Booleano";
        $booleano=true;
        echo "la variable es  $booleano es de tipo ",gettype($booleano) ;// cualquier cosa que no sea 0 es true
        print("<br>");
        $booleano2=false;
        echo "la variable es  $booleano2 es de tipo ",gettype($booleano2); // cualquier cosa que no sea 0 es true
        print("<br>");
        var_dump($booleano);
        print("<br>");
        var_dump($booleano2); //con var_dump SI DEVUELVE TRUE O FALSE EN LOS BOOLEANOS  
        //CADENAS DE TEXTO
        print "<br>";
        $micadena="hola";
        echo "la variable es  $micadena es de tipo ",gettype($micadena);
        //variable NULL
        $variableNull=null;
        print "<br>";
        echo "la variable es  $variableNull es de tipo ",gettype($variableNull);
        print "<br>";
        var_dump($variableNull);

        //Heredoc

        $cadena="se escribe a con comilla \"a\"";

        $heredoc= <<< TEXT
        escribo todo lo que quiero <p> con "comilla" </p>
        TEXT;

        echo $heredoc;


        $var = 0x2A;
        echo $var;
        $var = 8.3e-1;
        print "<br>";
        echo $var;

        //settype para cambiar de tipo la variable 
        echo "<h2>Conversion de tipos</h2>";

        $a=4;
        $b=4.5;
        $c="maria";
        $d=true;
        $f=null;
        

        print "<br>";
        $r=$a+$b;
        echo "la variable es  $a+$b es  $r de tipo ".gettype($r);
        print "<br>";
        $r=$a. $c;
        echo "la variable es  $a+$c es  $r de tipo ".gettype($r);
        print "<br>";
        $r=$a+$d;
        echo "la variable es  $a+$d es  $r de tipo ".gettype($r);
        print "<br>";
        $r=$a.$f;
        echo "la variable es  $a+$f es  $r de tipo ".gettype($r);
        print "<br>";

        //**************VARIABLES DE VARIABLES********************** */

    echo"<h2>VARIBLE DE VARIABLES</h2>";
        $alumno1="miguel";
        $alumno2="fernando";
        $alumno3="georgi";
        $alumno4="raul";

        $elegido="alumno".random_int(1,4);
        
        echo $$elegido; //usando la variable de variable ($$) sale el nombre ya que se referencia en la varible $elegido
    
    
    echo "<h2>VARIABLES POR REFERENCIA</h2>";




    ?>
    <a href="mipagina.php?nombre=maria?nombre2=georgi">pasar Nombre </a>

</body>
</html>