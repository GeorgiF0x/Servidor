
    <?
    if(isset($_REQUEST['partida'])||isset($_REQUEST['partidaMin'])){
       require ('../controllers/PartidaController.php');
    }

  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post">
        <input type="submit" value="Iniciar partida aleatoria" name="partida">
        <input type="submit" value="Iniciar partida Min" name="partidaMin">
        
        <?
        if(isset($_REQUEST['partida'])||isset($_REQUEST['partidaMin'])){
            $intentos=0;
            if(isset($_REQUEST['Probar'])){
                $intentos++;
            }
            ?>    
        <p>Introduce una letra: <input type="text" name="letra" id=""> <input type="submit" value="Probar Palabra" name="Probar"> numero de intentos: <input type="number" name="numIntentos" value=<?$intentos?>>
        <p>
            
            <?}
        if (isset($errores)) {
              escribirErrores($errores, "letra");
          } 
          ?>
          <table>
            <thead>
                <th>
                    id palabra
                </th>
                <th>
                    palabra
                </th>
                <th>
                    resultado
                </th>
                <th>
                    intentos
                </th>
                <th>
                   fecha
                </th>
            </thead>
          </table>
        </p>
    
    </form>
</body>
</html>