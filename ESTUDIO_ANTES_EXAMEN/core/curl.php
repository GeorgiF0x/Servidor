<?php

// require("insertar.php");

function get($recurso){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function post($recurso, $array){
    $array = json_encode($array);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //para imprimir los datos en el body
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json, Content-Length:'. strlen($array)));

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code != 201){
        echo "Ha habido algún error con la API";
    }

    curl_close($ch);
    return $response;
}

function put($recurso, $id, $array){
    $array = json_encode($array);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso.'/'.$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json, Content-Length:'. strlen($array)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code != 201){
        echo "Ha habido algún error con la API";
    }

    curl_close($ch);
    return $response;
}

function delete($recurso,$id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso.'/'.$id);
    $response = curl_exec($ch);
    return $response;
    
}

?>