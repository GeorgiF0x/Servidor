<?
require ("./configBD.php");
try {
    $conexion= mysqli_connect(IP,USER,PASS,'prueba');
    if($conexion){
        echo "Se ha conectado correctamente";
        $RequestNombre='miguel'; //imaginar que llega desde un formulario 
        $RequestEdad=20;
        //$sql = "insert into alumnos (nombre,edad) values (".$RequestNombre."".$RequestEdad.")";

        //consultas Preparadas
        $sql = "insert into alumnos (nombre,edad) values (?,?)";

        $stmt=mysqli_prepare($conexion,$sql);
        mysqli_stmt_bind_param($stmt,'si',$RequestNombre,$RequestEdad);
        mysqli_stmt_execute($stmt);
        mysqli_query($conexion,$sql);
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



?>