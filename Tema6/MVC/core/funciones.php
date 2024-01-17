<?php
     // para las funciones  que se usen en una aplicacion como sacar un texto etc..

function enviado (){
    if(!empty ($_REQUEST ['Enviar'])) return true;
    return false;
}
function modificar (){
    if(!empty ($_REQUEST ['modificar'])) return true;
    return false;
}

function textVacio ($campodetexto){
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

function validado(){
     if(isset($_SESSION['usuario'])){
          return true;
     }
}

function passIgual($pass,$repPass){
    if($pass !== $repPass){
        $errores['igual']="las contraseñas no coiciden";
        return false;
    }else{
        return true;
    }
}

function validarFormulario(&$errores)
{
    if (textVacio('nombre')) {
        $errores['nombre'] = "El campo Nombre está vacío -> ";
//     } elseif (!preg_match('/^[A-Za-z ]{3,}$/', $_REQUEST['nombre'])) {
     //    $errores['nombre'] = "El campo Nombre no cumple el patrón -> ";
    }

    if (textVacio('pass')) {
        $errores['pass'] = "El campo Contraseña está vacío -> ";
    }
//     elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/', $_REQUEST['pass'])) {
//         $errores['pass'] = "El campo Contraseña no tiene el formato del patrón -> ";
//     }

     if(count($errores)==0){
          return true;
     }else{
          return false;
     }
}