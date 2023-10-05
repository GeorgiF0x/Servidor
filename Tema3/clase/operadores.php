<style>
    
</style>

<?php

echo "<h1>Operadores</h1>";

    echo"nave espacial";
    echo "<br>"; //compara valores como lo hace "tolocaleCompare"
    echo 56<=>56;
    echo "<br>";
    //tomas de decicion , condicionantes y bucles
    echo "<h2>Condicionantes y bucles</h2>";
    if (4>32) {
        echo "Es mayor";
    }else{
        echo "es menor";}

    
        echo "<br>";
    
    $pisos=4;
    $asteriscos=1;

    for($i=0;$i<$pisos;$i++){
        for($j=1;$j<$pisos-$i;$j++){
            echo " ";
            
        }
        for($asteriscos;$asteriscos<(2*$pisos-$i);$asteriscos++){
            echo "*";
            echo "<br>";
        }

    }
  
// for ($i = 1; $i <= $pisos; $i++) {
//     for ($j = 1; $j <= $pisos - $i; $j++) {
//         echo" ";

//     }
//     for($k=1;$k>(2*$pisos-$i);$k++){
//         echo"*";
//     }
// };

