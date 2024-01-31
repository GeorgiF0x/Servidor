
<?
    $uri= "http://dataservice.accuweather.com/forecasts/v1/daily/5day/303121?apikey=UM9IlA7GRyNRB9oCJNpg5H3468q3NeDS&language=es-es";
    $contenido = file_get_contents($uri);
    // echo"<pre>"; 
    // echo $contenido;
    // if($contenido){
    //     $jsonContenido= json_decode($contenido,true); 
       
    //     echo "la temperatura minima es: ". $jsonContenido['DailyForecasts'][0]['Temperature']['Minimum']['Value'];
               
    // }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agregar Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    </style>
</head>
<body class="bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="header text-center mt-5 d-flex">
                        <h1>La api del tiempo<h1>
                </div>
            </div>
        </div>
   

    <!-- Agregar Bootstrap 5 JS al final del cuerpo del documento para una carga más rápida -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>