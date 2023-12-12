<?php

require ("./configBD.php");

$DSN = 'pgsql:host='.IP.';dbname=prueba2';

try{
    $con= new PDO($DSN,USER,PASS);
    echo "correcto";
    //leer la base de datos con PDO 
        //para leer todos 
        $sql="select * from tiempo";
        $result=$con->query($sql);
        while($row=$result->fetch(PDO::FETCH_BOTH)){ //mirar opciones de fetch en el manual 
            echo "<br> Hoy es un ".$row[1]." y hace : ".$row[2]." Grados";
        }

}catch(PDOException $e){
    echo $e->getMessage();
}finally{
    unset($con); //para cerrar la conexion y seguir con las preparadas
}

try{
    $con= new PDO($DSN,USER,PASS);
    //leer la base de datos con PDO 
        //Consultas preparadas
        $sql="insert into tiempo (descripcion,grados) values (?,?)";
        $stmt=$con->prepare($sql);
        // $stmt->execute(array('hace niebla',5));      
}catch(PDOException $e){
    echo $e->getMessage();
}finally{
    unset($con); //para cerrar la conexion y seguir con las preparadas
}

try{
    $con= new PDO($DSN,USER,PASS);
    //leer la base de datos con PDO 
        //Consultas preparadas con :
        $sql="insert into tiempo (descripcion,grados) values (:desc,:grad)";
        $stmt=$con->prepare($sql);
        $desc='Esta Nevando';
        $grad=-14;
        $stmt->bindParam(':desc',$desc);
        $stmt->bindParam(':grad',$grad);
}catch(PDOException $e){
    echo $e->getMessage();
}finally{
    unset($con); //para cerrar la conexion y seguir con las preparadas
}


try{
    $con= new PDO($DSN,USER,PASS);
    //leer la base de datos con PDO 
        //Consultas preparadas con :
        $sql="select * from tiempo where grados < 5";
        $stmt=$con->query($sql);
        $stmt->execute();
        $stmt->bindColumn(1,$descripcion);
        $stmt->bindColumn(2,$grados);
        while($row=$result->fetch(PDO::FETCH_BOUND)){ //mirar opciones de fetch en el manual 
            echo "<br> Hoy es un ".$descripcion." y hace : ".$grados." Grados <br>";
        }
}catch(PDOException $e){
    echo $e->getMessage();
}finally{
    unset($con); //para cerrar la conexion y seguir con las preparadas
}


