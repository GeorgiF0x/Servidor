<?php

$uri = "http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=%0914wSpECtEQGFOurv9WiciZZgEqgqMhC3&language=es-es";

$contenido = file_get_contents($uri);

echo '<pre>';
if ($contenido){

   
    $jsonContenido= json_decode($contenido, true);  //TRue convierte json en array asociativo, sino intenta convertirllo en objeto
    // print_r ($jsonContenido);

    echo 'La temperatura minima es : '. $jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value'];
}