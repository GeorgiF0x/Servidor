<?php

class Base{
    public static function response($head,$body = ''){
        // header('Content-Type: application/json');
        header($head, $body);
        echo $body;
        exit;
    }

    public static function divideURI(){
        $uri = $_SERVER['PATH_INFO'];
        return explode('/',$uri);
    }

    function generarIdAleatorio($min,$max) {
        $numeroAleatorio = rand($min, $max);
    return $numeroAleatorio;
    }

    public static function condiciones(){
        parse_str($_SERVER['QUERY_STRING'],$filtros);
        return $filtros;
    }
}

?>