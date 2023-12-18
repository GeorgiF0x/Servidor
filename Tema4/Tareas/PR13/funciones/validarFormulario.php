<?
function enviado (){
    if(!empty ($_REQUEST ['Enviar'])) return true;
    return false;
}
function modificar (){
    if(!empty ($_REQUEST ['modificar'])) return true;
    return false;
}

function textoVacio ($campodetexto){
    if (empty ($_REQUEST [$campodetexto])) return true;
    return false;
}

function printerror($errores, $valor){
  if (isset ($errores[$valor]))
    echo "<p class = error>".$errores[$valor]."</p>";

}

function recuerda($campo){
    if ((enviado() || modificar()) && !empty ($_REQUEST[$campo])) {
    echo "'$_REQUEST[$campo]'";
}else if (isset ($_REQUEST['Borrar']))
echo '';
}

function recuerdaDNI($dni){                     //Hago esta funcion para que el campo DNI no se pueda modificar y no se borre al darle al boton borrar
    if (isset ($_REQUEST['Borrar'])|| modificar()) {
    echo "'$_REQUEST[$dni]'";
}
}

function validarNombre ($nombre) {
$exp = '/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+$/';     //3 palabras empezando por Mayuscula
if ((preg_match ($exp, $nombre)) && (strlen($nombre)<=70)) return true;
return false;

}

function validarposicion ($posicion) {
//    $exp = '/^(Portero|Defensa|Central|Lateral|Delantero)$/';   //Validado por expresion Regular
//     if (preg_match ($exp, $posicion)) return true;

    $posiciones = ["Portero", "Defensa", "Central", "Lateral", "Delantero"];        //Validado por codigo PHP
    if (in_array($posicion, $posiciones))  return true;

    return false;
    
    }


function validaFecha ($fecha){
    $exp = '/^[\d]{4}\-[\d]{2}\-[\d]{2}$/';
    if (preg_match ($exp, $fecha)) return true;
    return false;

}

function validaDorsal ($dorsal){
    
    if ($dorsal>0 && $dorsal<25) return true;
    return false;

}

function validaSueldo ($sueldo){
    if (!is_numeric($sueldo))return false;

    $sueldoFloat = floatval($sueldo);
    if (($sueldoFloat >0))return true;
    
    return false;

}

  function validaDNI ($dni){

    $exp = '/^[\d]{8}[a-zA-Z]{1}$/';
    if (preg_match ($exp, $dni)) {
        $numeros = substr($dni,0,8);
        $letra= strtoupper(substr($dni,8,1));
        $resto = $numeros%23;
        $posibles = "TRWAGMYFPDXBNJZSQVHLCKE";
        if ($letra ==  substr ($posibles,$resto,1))return true;
        else return false;

  }else return false;
}

function validaFormulario(&$errores) {
    if (textoVacio('ejercicio')) $errores['ejercicio'] = 'El nombre del ejercicio no puede estar vacío.';
    if (!textoVacio('ejercicio') && strlen($_REQUEST['ejercicio']) > 200) $errores['validarEjercicio'] = 'El nombre del ejercicio no puede superar los 200 caracteres.';

    if (textoVacio('repeticiones')) $errores['repeticiones'] = 'Las repeticiones no pueden estar vacías.';
    if (!textoVacio('repeticiones') && (!is_numeric($_REQUEST['repeticiones']) || $_REQUEST['repeticiones'] < 1)) $errores['validarRepeticiones'] = 'Introduzca un número válido de repeticiones (mayor o igual a 1).';

    if (textoVacio('series')) $errores['series'] = 'Las series no pueden estar vacías.';
    if (!textoVacio('series') && (!is_numeric($_REQUEST['series']) || $_REQUEST['series'] < 1)) $errores['validarSeries'] = 'Introduzca un número válido de series (mayor o igual a 1).';

    if (count($errores) == 0) return true;
    return false;
}

function validarFormulario2(&$errores) {
    if (textoVacio('NomEjer')) $errores['NomEjer'] = 'El nombre del ejercicio no puede estar vacío.';
    if (!textoVacio('NomEjer') && strlen($_REQUEST['NomEjer']) > 200) $errores['validarEjercicio'] = 'El nombre del ejercicio no puede superar los 200 caracteres.';

    if (textoVacio('Repes')) $errores['Repes'] = 'Las repeticiones no pueden estar vacías.';
    if (!textoVacio('Repes') && (!is_numeric($_REQUEST['Repes']) || $_REQUEST['Repes'] < 1)) $errores['validarRepeticiones'] = 'Introduzca un número válido de repeticiones (mayor o igual a 1).';

    if (textoVacio('Series')) $errores['Series'] = 'Las series no pueden estar vacías.';
    if (!textoVacio('Series') && (!is_numeric($_REQUEST['Series']) || $_REQUEST['Series'] < 1)) $errores['validarSeries'] = 'Introduzca un número válido de series (mayor o igual a 1).';

    if (count($errores) == 0) return true;
    return false;
}
