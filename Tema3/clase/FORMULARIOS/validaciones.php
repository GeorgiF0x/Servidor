<?php
function textVacio($name){
  if(empty($_REQUEST[$name])){
    return true;
  }return false;
}

function enviado(){
    if(isset($_REQUEST['Enviar'])){
        return true;
    }return false;
}

function errores($errores,$name){
    if(isset($errores[$name])){
        echo $errores[$name];
    }
}

function recuerda($name){
    if(enviado() && empty($_REQUEST[$name])){
        echo $_REQUEST[$name];
    }
}