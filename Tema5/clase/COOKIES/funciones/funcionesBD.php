<?php
require ('confBD.php');

function findAll(){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM producto";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $arrayProductos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($arrayProductos, $producto);
        }
        return $arrayProductos;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}

function findById($id){
    $DSN = 'mysql:host='.IP.';dbname='.BD;
    try {
        $con = new PDO($DSN,USER,PASS);
        $sql = "SELECT * FROM producto WHERE codigo = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally{
        unset($con);
    }
}
