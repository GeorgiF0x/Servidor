<?php
    include("/var/www/Servidor/FuncionesUtiles/funcionesUtiles.php");
if(count($_FILES)!=0){
    // echo "<pre>";
    print_r($_FILES);
    //guardar el fichero subido
    //ruta para guardar el fichero
    $ruta= "/var/www/Servidor/Tema3/";
    //ruta + nombre 
    // $ruta.=basename($_FILES['fichero']['name']);
    // if(move_uploaded_file($_FILES['fichero']['tmp_name'],$ruta)){
    //     echo "Archivo subido";
    // }else{
    //     echo "ha fallado al subir el archivo";
    // }

    //subir varios ficheros 
    $numFichero=count($_FILES);
    
    for ($i=0; $i <=$numFichero ; $i++) { 
        $ruta.=basename($_FILES['fichero']['name'][$i]);
        if(move_uploaded_file($_FILES['fichero']['tmp_name'][$i],$ruta)){
            echo "archivo subido";
            echo "<pre>";
            print_r($_FILES);
        }else{
        echo "fallo al subir los ficheros";
        pintarBr(); 
    }
}
}

print_r($_REQUEST['fecha']);

