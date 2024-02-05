<?php

// function validarFormulario(&$errores)
// {
//     if (textVacio('nombre'))
//         $errores['nombre'] = "Nombre Vacio";
//     if (textVacio('pass'))
//         $errores['pass'] = "Contraseña Vacio";

//     if(count($errores) == 0)
//         return true;
//     return false;
    
// }

// function validarFormularioRegistro(&$errores)
// {
//     if (textVacio('nombre'))
//         $errores['nombre'] = "Nombre Vacio";
//     if (textVacio('pass'))
//         $errores['pass'] = "Contraseña Vacio";
//         if (textVacio('Reppass'))
//         $errores['Reppass'] = "Contraseña Vacio";


//     if(count($errores) == 0)
//         return true;
//     return false;
    
// }





function textVacio($name)
{
    if (empty($_REQUEST[$name]))
        return true;
    return false;
}

function errores($errores, $name)
{
    if (isset($errores[$name]))
        echo $errores[$name];
}

function validado(){
    if(isset($_SESSION['usuario']))
        return true;
    return false;
}

function passIgual($pass,$pass1){
    if($pass !== $pass1){
        $errores['igual'] = "Las contraseñas no coinciden";
        return false;
    }
    return true;
}


