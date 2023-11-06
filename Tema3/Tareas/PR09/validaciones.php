<?php
//para validar input text
function textVacio($name){
  if(empty($_REQUEST[$name])){
    return true;
  }return false;
}
//para validar Radio buttons
function radioVacio($name){
    if(isset($_REQUEST[$name])){
        return false;
      }return true;
}

function selectVacio($name){
    if(isset($_REQUEST[$name])&& $_REQUEST[$name]!=0){
        return false;
      }return true;
}
//para  comprobar si se ha enviado
function enviado(){
    if(isset($_REQUEST['Enviar'])){
        return true;
    }return false;
}
//para comprobar si esta en el array de errores antes de validar 
function errores($errores,$name){
    if(isset($errores[$name])){
        echo $errores[$name];
    }
}
//para que al enviar se guarden los campos rellenos 
function recuerda($name){
    if(enviado() && !empty($_REQUEST[$name])){
        echo $_REQUEST[$name];
    }else if (isset($_REQUEST['borrar'])){
        echo "";
    }
}
//para guardar los campos radio rellenos
function recuerdaRadio($name,$value){
    if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value){
        echo "checked";
    } else if (isset($_REQUEST['borrar'])){
        echo "";
    }
}

//para recordar CheckBox
function recuerdaCheckBox($name,$value){
    if(enviado() && isset($_REQUEST[$name]) &&  in_array($value,$_REQUEST[$name])){
        echo "checked";
    }else if (isset($_REQUEST['borrar'])){
        echo " ";
    }
}
//recuerda selects
function recuerdaSelect($name,$value){
    if(enviado() && isset($_REQUEST[$name]) && $_REQUEST[$name]==$value){
        echo "selected";
    } else if (isset($_REQUEST['borrar'])){
        echo "";
    }
}

//comprobar si la fecha es mayor de 18
function comprobarEdad($name){
    if (enviado() && isset($_REQUEST[$name])) {
        $fechaNacimiento = new DateTime($_REQUEST[$name]);
        $hoy = new DateTime();
        $diferencia = $fechaNacimiento->diff($hoy);
        
        if ($diferencia->y < 18) {
            echo "Es menor de 18 años.";
        } else {
            echo "Es mayor de 18 años.";
        }
    }
}

//funciones para validar y calcular letra de dni 

function validarDni($dni){

    $dniSinletra=substr($dni,8);
    $arrayDNI=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
    $dniSinletra=$dniSinletra.$arrayDNI[(int)$dniSinletra % 23];
    if($dni<=>$dniSinletra){
        echo "el dni es correcto";
    }else {
        echo "el dni no es valido";
    }
}

function calcularLetraDni(&$dni){
    $arrayDNI=["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
    $dni+=$arrayDNI[(int)$dniSinletra % 23];
}

//valida formulario
function validarFormulario(&$errores){

        if(textVacio('Nombre')){
           $errores['Nombre']="Nombre esta vacio->";
        }elseif (!preg_match('/^[A-Za-z ]+$/', $_REQUEST['Nombre'])) {
            $errores['Nombre'] = "Nombre no es válido -> ";
        }
        if(textVacio('Apellido')){
            $errores['Apellido']="Apellido esta Vacio->";
        }
       if(textVacio('Contraseña')){
        $errores['Contraseña']="Contaseña esta Vacio->";
    }if(textVacio('repContraseña')){
        $errores['repContraseña']="Repetir contraseña Vacio-> ";
       } if(textVacio('Fecha')){
        $errores['Fecha']="Fecha esta Vacio->";
    }if(textVacio('DNI')){
        $errores['DNI']="DNI esta Vacio->";
    }
    if(textVacio('Email')){
        $errores['Email']="EMAIL esta Vacio->";
    }
    if(textVacio('Fichero')){
            $errores['Fichero']="<-No has seleccionado un fichero";
       }
      if(count($errores)==0){
            return true;
       }else{
        return false;
       }
}