<?php
$errores = array();
if (!isset($_SESSION['palabra'])) {
    $_SESSION['vista'] = VIEW . 'juego.php';
    $palabra = PalabraDAO::findRandom();
    $_SESSION['palabra'] = $palabra;
}

if (isset($_REQUEST['botonIntento'])) {
    if (!isset($_SESSION['intentos'])) {
        $_SESSION['intentos'] = 0;
    }
    
    // Validar la letra ingresada
    if (validarLetra($errores)) {
        if ($_SESSION['intentos'] < 6) {
            $letraJuego = isset($_REQUEST['letraJuego']) ? strtoupper($_REQUEST['letraJuego']) : '';
            $intentoJuego = isset($_SESSION['intentoJuego']) ? $_SESSION['intentoJuego'] : ''; // Obtener las letras adivinadas hasta ahora
    
            
            $resultadoComparacion = compararPalabras($letraJuego, $_SESSION['palabra']->palabra);
    
        
            if ($resultadoComparacion === 'x') {
                $_SESSION['intentos']++;
            }
    
            
            $intentoJuego .= $resultadoComparacion;
            $_SESSION['intentoJuego'] = $intentoJuego;
        }
    
      
        $todasAdivinadas = true;
        foreach (str_split($_SESSION['palabra']->palabra) as $letraPalabra) {
            if (strpos($intentoJuego, strtoupper($letraPalabra)) === false) {
                $todasAdivinadas = false;
                break;
            }
        }
    
        if ($todasAdivinadas) {
            // Si todas las letras de la palabra han sido adivinadas, el jugador ha ganado
            echo "¡Has adivinado la palabra!";
            $resultadoPartida = "ganada"; // Resultado de la partida
            // Redirigir al jugador al inicio de la partida
            $_SESSION['vista'] = VIEW . 'inicioPartida.php';
            $_SESSION['palabra'] = null;
            $_SESSION['intentos'] = null;
            $_SESSION['intentoJuego'] = null;
            if ($_SESSION['palabra'] !== null) {
                
                $ultimaEstadistica = new Estadistica(
                    null,
                    $_SESSION['usuario']->id_usuario,
                    $_SESSION['palabra']->id_palabra,
                    $resultadoPartida,
                    $_SESSION['intentos'],
                    date('Y-m-d H:i:s')
                );
                $insertada=EstadisticaDao::insert($ultimaEstadistica);
                if($insertada){
                    echo "Estadistica insertada";
                }
            }
        } elseif ($_SESSION['intentos'] >= 6) {
            // Si se han excedido los intentos, el jugador ha perdido
            echo "Has excedido el número máximo de intentos.";
            $resultadoPartida = "perdida"; // Resultado de la partida
            // Redirigir al jugador al inicio
            $_SESSION['vista'] = VIEW . 'inicioPartida.php';
            $_SESSION['palabra'] = null;
            $_SESSION['intentos'] = null;
            $_SESSION['intentoJuego'] = null;
            if ($_SESSION['palabra'] !== null) {
                
                $ultimaEstadistica = new Estadistica(
                    null,
                    $_SESSION['usuario']->id_usuario,
                    $_SESSION['palabra']->id_palabra,
                    $resultadoPartida,
                    $_SESSION['intentos'],
                    date('Y-m-d H:i:s')
                );
                $insertada=EstadisticaDao::insert($ultimaEstadistica);
                if($insertada){
                    echo "Estadistica insertada";
                }
            }
        }
 
    }
}
?>









    