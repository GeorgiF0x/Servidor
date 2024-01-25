
<?
    $uri= "http://dataservice.accuweather.com/forecasts/v1/daily/1day/303121?apikey=UM9IlA7GRyNRB9oCJNpg5H3468q3NeDS&language=es-es";

    $contenido = file_get_contents($uri);
    echo"<pre>";
    if($contenido){
        $jsonContenido= json_decode($contenido,true); //para en vez de convertirlo en un json objeto , lo convierta en un json array asociativo
        
        echo "la temperatura minima es: ". $jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value'];
        
        
    }


?>