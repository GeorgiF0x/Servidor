<?


/*
//Primero ver si existe

//abrir y leer
echo '<h1>ABRIR Y LEER </h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe<br>';

    if (!$fp = fopen('fichero.txt', 'r'))      //Si no se puede abrir
        echo 'Ha habido un problema al abrir el fichero.';
    else {                                              //Si Exsiste y se abre, ejecutamos codigo

        $leido = fread($fp, filesize('fichero.txt'));      //filesize es una funcion que determina el tamaño en bytes del archivo. Se puede poner una cantidad de bytes a leer.
        echo $leido;
        fclose($fp);
    }
} else {
    echo 'No existe';

}




//Escribir    w
echo '<h1>Escribir Borra lo anterior</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'w'))   //Se abre en modo escritura (Acordarse de los permisos)
    echo 'Ha habido un problema al abrir el fichero.';
else {                  //si existe y se abre ejecutamos codigo
    
    $texto = 'Escribiendo...';
    if (!fwrite($fp, $texto, strlen($texto)))  //Puntero, texto a escribir, longitud a escribir (o hasta q se coplete $texto)  strlen = Longotus de un String
            echo 'Error al escribir';
        
    
        fclose($fp);
    }
} else {
    echo 'No exisste';
}



//Escribir al final   a
echo '<h1>Escribir al final</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'a'))       //Abrimos el fichero en modo escritura con el puntero al final (Acordarse de los permisos)
    echo 'Ha habido un problema al abrir el fichero.';
    else {
        
        $texto = 'Escribiendo...';
        if (!fwrite($fp, $texto, strlen($texto)))
        echo 'Error al escribir';
    
    fclose($fp);
    
}
} else {
    echo 'No exisste';
}



//Escribir al medio
echo '<h1>Escribir al Medio</h1>';
if (file_exists('fichero.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('fichero.txt', 'c'))   //Apertura para escribir con puntero al principio, pero no sobreeescribe (Acordarse de los permisos)
    echo 'Ha habido un problema al abrir el fichero.';
    else {                                  //Si existe y abre ejecutamos el codigo
        
        $texto = ' Texto a escribir ';
        fseek($fp, 28);         //Movemos el puntero del archivo abierto al caracter 28
        if (!fwrite($fp, $texto, strlen($texto)))
        echo 'Error al escribir';
    
    
    fclose($fp);
}
} else {
    
    echo 'No exisste';
}


//Leer un fichero por lineas
echo '<h1>Leer un fichero por lineas</h1>';
if (file_exists('ficherolineas.txt')) {
    if (!$fp = fopen('ficherolineas.txt', 'r'))     //Abrimos en modo lectura
    echo 'Ha habido un problema al abrir el fichero.';
    else {
        echo 'Existe <br>'; //Si existe y abre ejecutamos el codigo
        
        while ($leido = fgets($fp, filesize("ficherolineas.txt"))) {     //fgets($apertura, Tamaño a leer)  El bucle se hace de esta manera
            echo '<br>' . $leido;
        }
        fclose($fp);
    }
} else {
    echo 'No existe';
}

//Escribir un fichero por lineas al final
echo '<h1>Escribir un fichero por lineas al final</h1>';
if (file_exists('ficherolineas.txt')) {
    echo 'Existe <br>';
    if (!$fp = fopen('ficherolineas.txt', 'a'))     //Abrimos en modo escritura con el puntero al final (Acordarse de los permisos)
    echo 'Ha habido un problema al abrir el fichero.';
else {
    $texto = "\nMi nueva linea";                    
    if (!fputs($fp,$texto, strlen($texto)))     //Puntero, texto a escribir, longitud a escribir
    echo ' Error al escribir';
    
    
    fclose($fp);
}
} else {
    echo 'No existe';
}



*/

//Escribir un fichero en la "X" linea
echo '<h1>Escribir un fichero en la segunda linea</h1>';

//Modificar un fichero secuencial
//Creamos arcgivo temporal, leer y modificar
//borrar anterior y renombrar el temporal 

$tmp = tempnam('.', 'tem.txt'); //Creamos fichero temporal.  (ruta, nombre)
chmod($tmp, 0777);  // damos permisos al fichero temporal
if (file_exists('ficherolineas.txt')) {
    echo 'Existe <br>';
    if ((!$fp = fopen('ficherolineas.txt', 'r')) || (!$ft = fopen($tmp, 'w'))) //abrimos original en lectura y temporal en escritura
        echo 'Ha habido un problema al abrir el fichero.';
    else { //Ejecutamos codigo

        $texto = "Texto que quiero escribir\n";
        $contador = 1; //contador de lineas

        while ($leido = fgets($fp, filesize("ficherolineas.txt"))) { //leemos por lineas
            fputs($ft, $leido, strlen($leido)); //Escribimos en el temporal una linea del original
            if ($contador == 1) {   //si llegamos al contaor
                fputs($ft, $texto, strlen($texto));   //escribimos en el temporal nuestro texto
                fputs($ft, "\n", strlen("\n"));
                $contador++;   
            }
        }
        fclose($fp);   //Cerramos ambos ficheros
        fclose($ft);
        unlink('ficherolineas.txt');    //Borra el fichero
        rename($tmp, "ficherolineas.txt");      //Renombra el fichero
    }
} else {
    echo 'No existe';
}

