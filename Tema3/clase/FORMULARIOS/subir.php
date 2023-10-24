<?php

if(count($_FILES)!=0){
    echo "<pre>";
    print_r($_FILES);
    //guardar el fichero subido
    //ruta para guardar el fichero
    $ruta= "/var/www/Servidor/tema3/";
    //ruta + nombre 
    $ruta.=basename($_FILES['fichero']['name']);
    
}