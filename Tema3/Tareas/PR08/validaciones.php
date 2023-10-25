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
    $hoy = new datetime();
    if(enviado() && isset($_REQUEST[$name]) &&  strtotime($_REQUEST[$name])->diff($hoy)< 18){
        echo "es menor de edad";
    };
}

//valida formulario
function validarFormulario(&$errores){

        if(textVacio('Nombre')){
           $errores['Nombre']="<-Nombre esta vacio";
        }
        if(textVacio('Apellido')){
            $errores['Apellido']="<-Apellido esta Vacio";
        }
       if(radioVacio('genero')){
        $errores['genero']="<-No has marcado Genero";
       }
       if(radioVacio('aficion')){
        $errores['aficion']="<-No has seleccionado ninguna aficion";
       }if(textVacio('fecha_nacimiento')){
        $errores['fecha_nacimiento']="<-No has puesto ninguna fecha ";
       }if(selectVacio('equipos')){
        $errores['equipos']="<-No has seleccionado equipo";
       }if(textVacio('fichero')){
            $errores['fichero']="<-No has seleccionado un fichero";
       }if(count($errores)==0){
            return true;
       }else{
        return false;
       }
    
}