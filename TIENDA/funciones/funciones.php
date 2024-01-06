<?php
require("configBD.php");

function verificarBDD()
{
    try {
        $conexion= mysqli_connect(IP,USER,PASS,'Tienda');
        if($conexion){
            echo "Se ha conectado correctamente";
     
    
            
            mysqli_close($conexion);
    
        }else{
            echo "error MYSLQ";
        }
    } catch (\Throwable $th) {
        //segun codigos
        // switch ($th->code) {
        //     case '1045':
        //         echo "fallo al conectarse a la BD acceso denegado";
        //         break;
        //     case '1065':
        //         echo "fallo al insertar linea en la tabla ,Mismo ID";
        //          break;
        //     default:
        //             echo $th->getMessage();
        //         break;
        // }
        echo mysqli_connect_errno(). "<br>";
        echo mysqli_connect_error();
        mysqli_close($conexion);
        //errores
        /*
        1045 ACCESO DENEGADO
        */
    }
    
}

// Llamada a la función para verificar y crear la base de datos si es necesario
verificarBDD();
?>


