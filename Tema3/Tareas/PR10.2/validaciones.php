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
        $texto=[$nombre,$valor1,$valor2,$valor3];
    fputcsv ($fp,$texto,";");
    fclose($fp);
}

function modificarCSV($valor1,$valor2,$valor3,$valor4){
    
    $tmp = tempnam('.',"tem.csv");
    chmod($tmp,0777);
    if((!$fp=fopen("notas.csv",'r')) || (!$ft = fopen($tmp,'w')));    
else{        
    $texto=[$valor1,$valor2,$valor3,$valor4];

    while ($leido = fgetcsv($fp, filesize("notas.csv"), ";")) {
        if($leido[0]!= $valor1){
            fputcsv($ft,$leido,";");
            
        }else if($leido[0]== $valor1){
            fputcsv($ft,$texto,";");
        }
    }
    fclose($fp);
    fclose($ft);
    unlink("notas.csv");
    rename($tmp,"notas.csv");
}
}


// añadirCSV("GEORGI2",7,7,10);



function eliminarRegistro($valor) {
    $tmp = tempnam('.',"tem.csv");
    chmod($tmp,0777);
    if((!$fp=fopen("notas.csv",'r')) || (!$ft = fopen($tmp,'w')));    
else{        

    while ($leido = fgetcsv($fp, filesize("notas.csv"), ";")) {
        if($leido[0]!= $valor){
            fputcsv($ft,$leido,";");   
        }
    }
    fclose($fp);
    fclose($ft);
    unlink("notas.csv");
    rename($tmp,"notas.csv");
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


