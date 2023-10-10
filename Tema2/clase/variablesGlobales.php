<style>

</style>

<h1>Server</h2>
<pre >
<?php

    //Super variables Globales

        //Server contiene informacion del servidor

    print_r($_SERVER);
?>
</pre>
<h1>Get</h2>
<pre >
<?php

    //Super variables Globales

        //get contiene informacion de las variables enviadas por get

    print_r($_GET);
?>
</pre>
<h1>Request</h2>
<pre >
<?php
    //Super variables Globales

        //Get contiene informacion de las variables enviadas por get

    print_r($_REQUEST);
?>
</pre>

<h1>Cookie</h2>
<pre >
    <?php
    //Super variables Globales
    
    //Get contiene informacion de las variables enviadas por get
    
    print_r($_COOKIE);
    ?>
</pre>

<p>****************************************************************************************************************</p>

<?php
    echo "<h1>ambito de variables</h1>";

    $contador=5;

    function PruebaVariable($contador){
        echo $contador . "<br>";
        $contador++;
        echo $contador;
    }
    function PruebaVariablePorReferencia(&$contador){
        echo $contador . "<br>";
        $contador++;
        echo $contador;
    }
    
    function PruebaVariablePorGlobal(){
        global $contador;
        echo $contador . "<br>";
        $contador++;
        echo $contador;
    }
    PruebaVariable($contador);
    echo "<br>";
    echo "por referencia";
    echo "<br>";
    PruebaVariablePorReferencia($contador);
    echo "<br>";
    echo "por global";
    PruebaVariablePorGlobal();
    echo "<br>";
    echo "por global"; 
    echo "</br>";

    $ruta = $_SERVER['SCRIPT_FILENAME'];
    echo "<a href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Contenido</a>";


    
    


    
