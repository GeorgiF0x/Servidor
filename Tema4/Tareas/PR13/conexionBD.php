<?
require ("./configBD.php");
$DSN = 'pgsql:host='.IP.';dbname=prueba2';

try{
    $con= new PDO($DSN,USER,PASS);
    echo "conexion correcta<br>";
    $sql="create database GYM";
    $result= $con->exec($sql);
    $DSN = 'pgsql:host='.IP.';dbname=GYM';
    $con= new PDO($DSN,USER,PASS);
    $sql=file_get_contents("./script.sql");
    $result=$con->exec($sql);
}catch(PDOException $e){
    echo $e->getMessage();
}finally{
    unset($con); 
}