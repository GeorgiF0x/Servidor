<?php

function guardarNombreFichero($name){
    return $_REQUEST[$name];
}

function textVacio($name)
{
    if (empty($_REQUEST[$name])) {
        return true;
    }
    return false;
}
function errores($errores,$name){
    if(isset($errores[$name])){
        echo $errores[$name];
    }
}
function leerFichero(){
//primero ver si existe
// abrimos y lo leer
echo "<h1>Leer fichero</h1>";
if(file_exists(guardarNombreFichero('Nombre'))){
    echo "Existe";
    if(!$fp=fopen(guardarNombreFichero('Nombre'),'r'))
        echo "Ha habido un problema al abrir el fichero";
    else{
        $leido = fread($fp,filesize(guardarNombreFichero('Nombre')));
        echo $leido;
        fclose($fp);
    }
}else{
    echo "No existe";
}
}



function crearEscribirFichero(){
    echo "<h1>Escribir fichero con w borra lo anteior</h1>";
if(file_exists(guardarNombreFichero('Nombre'))){
    echo "Existe";
    if(!$fp=fopen(guardarNombreFichero('Nombre'),'x'))
        echo "Ha habido un problema al abrir el fichero";
    else{
        $texto = "Has creado el fichero";
        if(!fwrite($fp,$texto,strlen($texto)))
        echo "Error al escribir";
        fclose($fp);
    }
}else{
    echo "No existe se creara el fichero";
}
}

function escribirFichero(){
if(file_exists(guardarNombreFichero('oculto'))){
    if(!$fp=fopen(guardarNombreFichero('oculto'),'w'))
        echo "Ha habido un problema al abrir el fichero";
    else{
        $texto = $_REQUEST['texto'];
        if(!fwrite($fp,$texto,strlen($texto)))
        echo "Error al escribir";
        fclose($fp);
    }
}else{
    echo "No existe";
}
}

function enviadoLeer(){
    if(isset($_REQUEST['Leer'])){
        return true;
    }return false;
}

function enviadoEscribir(){
    if(isset($_REQUEST['Escribir'])){
        return true;
    }return false;
}



function validarFormulario(&$errores)
{
    if (textVacio('Nombre')) {
        $errores['Nombre'] = "No has seleccionado un fichero -> ";
    } elseif (!preg_match('/\.[A-za-z{3,3}]$/', guardarNombreFichero('Nombre'))) { //i para que sean mayusculas o minusculas 
        $errores['Fichero'] = "La extension del fichero  no es válida ";
    } 
    if (count($errores) == 0) {
        return true;
    } else {
        return false;
    }
}

