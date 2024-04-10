<?php

require("./modelo/Carrito.php");
require_once("./dao/factoryBD.php");

class CarritoDAO{


    public static function findAll() {
        $sql = "select * from Carrito";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql,$parametros);
        if ($result->rowCount() > 0) {
            $productosCarritoStd = $result->fetchAll(PDO::FETCH_ASSOC); 
            return $productosCarritoStd; 
        } else {
            return null; 
        }
    }
    public static function findById($id){
        $sql = "select * from Carrito where Id  = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $productoCarritoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoCarritoStd;
        } else
            return null;
    }
    public static function findByUserId($id){
        $sql = "select * from Carrito where IdUsuario  = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $productoCarritoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoCarritoStd;
        } else
            return null;
    }
    public static function findByUserAndProductoId($idUser,$idProducto){
        $sql = "select * from Carrito where IdUsuario  = ? and IdProducto = ?";
        $parametros = array($idUser,$idProducto);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $productoCarritoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoCarritoStd;
        } else
            return null;
    }
    public static function insert($carrito){
        $sql = "insert into Carrito (IdUsuario,IdProducto,Borrado) values (?,?,?)";
        $parametros = array(
            $carrito->IdUsuario,
            $carrito->IdProducto,
            $carrito->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function update($carrito){
        $sql = "update Carrito set IdUsuario = ?, IdProducto = ?, Precio = ?, Borrado = ? where id = ?";
        $parametros = array(
            $carrito->IdUsuario,
            $carrito->IdProducto,
            $carrito->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function delete($id){
        $sql = "delete from Carrito where id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }
}