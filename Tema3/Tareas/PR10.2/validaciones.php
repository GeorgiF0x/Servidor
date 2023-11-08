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


