<?php

function añadirAlarray(&$array,$value){
    $ultimo=count($arrsay);
    $array[$ultimo]=$value;
    print_r($array);
}

function pintarBr(){
    echo "<br>";
}

function cadenaEntreH1($cadena){
    echo "<h1> ".$cadena."</h1>";
}

function ficheroActual(){
    return $ruta = $_SERVER['SCRIPT_FILENAME'];
}


function validarDni($dni){
    // if(strlen($dni)>9  substr($dni,-1)!=gettype($dni)"integer"){

    // }
    $dniSinletra=substr($dni,8);
    $arrayDNI=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
    $dniSinletra=$dniSinletra.$arrayDNI[(int)$dniSinletra % 23];
    if($dni<=>$dniSinletra){
        echo "el dni es correcto";
    }else {
        echo "el dni no es valido";
    }
}

function calcularLetraDni(&$dni){
    $arrayDNI=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
    $dni+=$arrayDNI[(int)$dniSinletra % 23];
}

function generaAleatorio($arrayNum,$min,$max,$cantidadNums,$repetir){
    $arrayNum=array();
    for ($i=0; $i <$cantidadNums ; $i++) {
        $numero=rand($min,$max);
        array_push($arrayNum,$numero);
        if($repetir==false && in_array($numero,$arrayNum)){
            $numero=rand($min,$max);
            array_push($arrayNum,$numero);
        } 
}
}