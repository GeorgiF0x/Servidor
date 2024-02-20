<?php

function validaFormulario(&$errores){
    if(textVacio('nombre')){
        $errores['nombre'] = "Nombre vacío";
    }
    if (textVacio('pass')) {
        $errores['pass'] = "Contraseña vacía";
    }
    if (count($errores)==0)
        return true;
    else
        return false;
}

function textVacio($name){
    if (empty($_REQUEST[$name])) {
        return true;
    } else {
        return false;
    }
}

function errores($errores,$name){
    if(isset ($errores[$name]))
        echo $errores[$name];
}

function validado(){
    if(isset($_SESSION['usuario']))
        return true;
}

function passIgual($pass,$pass1,&$errores){
    if($pass !== $pass1){
        $errores['igual'] = "Las contraseñas no coinciden";
        return false;
    }
    return true;
}

function isAdmin(){
    if($_SESSION['usuario']->perfil == 'administrador')
        return true;
    return false;
}