<?php

function get($recurso){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code != 200) echo "Error al listar";
    curl_close($ch);
    return $response;
    

}

function post($recurso, $array){
    $array = json_encode($array);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/json', 'Content-Length:'.strlen($array)));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$array);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code != 201) echo "Error al insertar";
    curl_close($ch);
    return $response;

}

function put($recurso, $id, $array){
    $array = json_encode($array);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI.$recurso."/".$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/x-www-form-urlencoded'.strlen($array)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS,$array);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code != 201) echo "Error al modificar";
    curl_close($ch);
    return $response;

}

function delete($recurso, $id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI.$recurso."/".$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code != 201) echo "Error al borrar";
    curl_close($ch);
    return $response;

}




?>