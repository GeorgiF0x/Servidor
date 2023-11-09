<?
function leerSCV(){
    $fp = fopen ("notas.csv","r");
    /*
        Para leer ficheros SCV se le pasa un array donde guarda lo que lee hasta ; y para mostrar el dato se imprime el array con la posicion 0 como clave
         y seguido del resto como valor segun la cantidad de valores que sean
    */
    while ($ArrayDatos = fgetcsv ($fp, filesize("notas.csv"), ";")) { 
        foreach ($ArrayDatos as $key => $value) {
            echo "<td> ". $ArrayDatos[$key]. " </td>";
        }
    }
    fclose ($fp);
}


function añadirCSV($nombre,$valor1,$valor2,$valor3){
    $fp = fopen ("notas.csv","a");
    fwrite ($fp, "\n".$nombre.";".$valor1.";".$valor2.";".$valor3);
    fclose($fp);
}

function modificarCSV($valor1,$valor2,$valor3){
    $fp = fopen ("notas.csv","r+");
    while ($data = fgetcsv ($fp, filesize("notas.csv"), ";")) {
        echo $data[0].' -> '.$data[1];
        fwrite ($fp, $data[0],$data[1]=$valor1.";");
        }
}

añadirCSV("GEORGI2",7,7,10);



function eliminarRegistro($indice) {
    // Abre el fp CSV en modo lectura y escritura
    $fp = fopen("notas.csv", "r+");
    // Lee todas las líneas del fp
    $registros = [];
    while ($fila = fgetcsv($fp, filesize("notas.csv"), ";")) {
        $registros[] = $fila;
    }
    // Cierra el fp
    fclose($fp);
    // Elimina el registro con el índice proporcionado
    if (isset($registros[$indice])) {
        unset($registros[$indice]);
    }
    // Abre el fp en modo escritura para sobrescribir el contenido
    $fp = fopen("notas.csv", "w");
    // Escribe los registros actualizados en el fp
    foreach ($registros as $registro) {
        fputcsv($fp, $registro, ";");
    }
    // Cierra el fp
    fclose($fp);
}



function actualizarDatosCSV($filePath) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
        // Formulario enviado, actualizar el archivo CSV con los nuevos datos
        $fp = fopen($filePath, "r+");
        // Saltar la fila de encabezado
        fgetcsv($fp, filesize($filePath), ";");
        while ($ArrayDatos = fgetcsv($fp, filesize($filePath), ";")) {
            // Guardar la posición actual del puntero
            $posicion = ftell($fp);
            // Recorrer cada fila y actualizar los datos
            foreach ($ArrayDatos as $key => $value) {
                if (isset($_POST['campo_' . $key])) {
                    // Actualizar el valor con los datos enviados
                    $ArrayDatos[$key] = $_POST['campo_' . $key];
                }
            }
            // Mover el puntero de archivo al principio de la fila
            fseek($fp, $posicion);
            // Escribir los datos actualizados de nuevo al archivo
            fputcsv($fp, $ArrayDatos, ";");
        }
        fclose($fp);
    }
}


function enviadoModificar(){
    if(isset($_REQUEST['mod'])){
        return true;
    }return false;
}



function enviadoEliminar(){
    if(isset($_REQUEST['rem'])){
        return true;
    }return false;
}


