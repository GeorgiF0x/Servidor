<?
require ("./configBD.php");
try {

        $conexion= mysqli_connect(IP,USER,PASS,'prueba');
        $sql= "delete  from alumnos where id >=2";
        mysqli_query($conexion,$sql);
        $sql2= "select * from alumnos";
        echo mysqli_affected_rows($conexion);
        $result=mysqli_query($conexion,$sql2);
       while($array= mysqli_fetch_assoc($result)){
            echo "<pre>";
            print_r($array);
       }
        mysqli_close($conexion);
        
    
} catch (\Throwable $th) {
    echo mysqli_connect_errno(). "<br>";
    echo mysqli_connect_error();
    mysqli_close($conexion);
    //errores
    /*
    1045 ACCESO DENEGADO
    */
}