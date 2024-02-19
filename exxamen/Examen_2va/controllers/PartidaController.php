<?
    require("../core/funciones.php");
    require("../dao/PalabraDao.php");
    require("../consumirAPI/curl.php");
    $errores = array();
    if(isset($_REQUEST['partida'])||isset($_REQUEST['partidaMin'])){
        if(validarLetra($errores)){
            $idPalabra=generarIdAleatorio(1,90);
            // $palabraAleat= get('palabra'/'num_letras='.generarIdAleatorio(0,100));
            // $palabraAleat = json_decode($palabraAleat,true);
            $busquedapalabraAleatoria=PalabraDao::findById($idPalabra); //he dejado el modelo y dao de palabra en esta carpeta para poder sacar palabras y probar
            $palabra=$busquedapalabraAleatoria->palabra;
            echo $palabra;//para hacer pruebas
        }
    
 
    }