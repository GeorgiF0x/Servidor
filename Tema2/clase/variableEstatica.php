<?php
//VARIABLE ESTATICA  ,SOLO SE INICIALIZA UNA VEZ 


function contador(){
    static $c=0;
    $c++;
    echo "<br>";
    echo $c;
    echo "<br>";
}   

contador();
contador();
contador();
contador();
contador();