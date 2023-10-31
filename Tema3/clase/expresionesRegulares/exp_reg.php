<?php
    $exp='/maria/';
    echo preg_match($exp,'maria es mi profe');  //preg_match es la funcion para buscar en el string segun la expresion regular
   
    echo "<br> uso de comodin";
    $exp='/mari./';
    echo "<br>";
   
    echo preg_match($exp,'mario es mi profe');
    echo "<br> uso de 'o' maria o mario";
    $exp='/mari[ao]/';
    echo "<br>";
    echo preg_match($exp,'mario es mi profe');
    echo "<br>";
    echo preg_match($exp,'maria es mi profe');
   
    echo "<br> uso de espacio letra cualquiera y otro espacio";
    $exp='/\s[A-Z a-z]\s/';
    $frase="hoy es halloween y salimos a tomar unas cervezas";
    echo "<br>";
    echo preg_match($exp,$frase);
    echo "<br>";
    echo "<br>";
    preg_match_all($exp,$frase,$array);
    echo"<br><pre>";
    print_r($array);
    echo "<br>Numerico";
    $exp='/\d{4}/'; //con esto selecciona una cifra compuesta de 4 caracteres
    $frase="hoy es dia 31 de 2023 y  es halloween";
    echo "<br>";
    echo preg_match($exp,$frase);
    echo "<br>";
    echo "<br>";
    preg_match_all($exp,$frase,$array);
    echo"<br><pre>";
    print_r($array);

    //CODIGO IBAN 
    echo "<h3>codigo iban expresion regular</h3>";
    $exp='/^A-Z{2}\d{2}\s\d{4}\s\d{4}\s\d{2}\s\d{10}$/';
    $frase="ES70 1234 1234 01 0123456789";
    echo preg_match($exp,$frase);
    echo "<br>";
    preg_match_all($exp,$frase,$array);
    echo"<br><pre>";
    print_r($array);
    echo "<br> uso de no contiene ^";
    $exp='/mari[^ao]/';
     //expresion regular que permita meter nov,noviembre o november
    $exp='/^nov(iembre|ember)?$/';
    echo "<br>";
    echo preg_match($exp,'nov');
    echo "<br>";
    echo preg_match($exp,'noviembre');
    echo "<br>";
    echo preg_match($exp,'november');
    echo "<br>";
    echo preg_match($exp,'anov');
    echo "<br>";
    echo preg_match($exp,'novasdasdas');

    $array=['lunes','martes','miercoles','jueves','viernes','sabado'];
    $esp='/es$/';
    echo "<br><pre>";
    print_r(preg_grep($esp,$array));    

    $array=[1,"a","B",4];
    $patron=['/^\d$/' ,'/^\D$/'];
    $cambio=["numero","letra"];
    echo "<br><pre>";
    print_r(preg_replace($patron,$cambio,$array)); 
    $patron=['/^\d$/'];
    $cambio="numero";
    print_r(preg_filter($patron,$cambio,$array));  //filter solo devuelve un arrai con los que ha cambiado

    $frase= "maria es mi profe";
    $patron='/a/';
    $cambio="@";
    print_r(preg_filter($patron,$cambio,$frase));


    //llamadas a funciones callback
    echo "<h2>replace_callback</h2>";
    $frase="si hay una fecha 1/2/2012 esta bien pero 10/2/2021 mal, y 15/12/21 mal";
    //si mes solo tiene un digito añado un 0 delante 
    //si es año solo tiene 2 digitos si es <23 le añado 20 delante y si es mayor 19

    function corrige($coincide){
       if($coincide[1]<10){
        $coincide[1]="0".$coincide[1];
       }
       if($coincide[3]<10){
        $coincide[3]="0".$coincide[3];
       }
       if($coincide[5]<=23){
        $coincide[5]="20".$coincide[5];
       }elseif($coincide[5]>23 && $coicide<100){
        $coincide[5]="19".$coincide[5];
       }

    //    return $coicide[1].$coicide[2].$coicide[3].$coicide[4].$coicide[5].$frase;

    }
    $exp='/(\d{1,2})(\/)(\d{1,2})(\/)(\d{2,4})/';
    
    preg_match_all($exp,$frase,$array);
    print_r($array);
    preg_replace_callback($exp,'corrige',$frase);




    ?>