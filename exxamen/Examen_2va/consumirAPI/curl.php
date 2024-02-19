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



?>