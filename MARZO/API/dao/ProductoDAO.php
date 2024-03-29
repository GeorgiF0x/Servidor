<?php

require("./modelo/Producto.php");
require_once("./dao/factoryBD.php");

class ProductoDAO{


    public static function findAll(){
        $sql = "select * from Producto";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql,$parametros);
        $arrayProductos = array();
        while ($productosStd = $result->fetchObject()) {
            $producto = new Producto(
                $productosStd->Id,
                $productosStd->Nombre,
                $productosStd->Descripcion,
                $productosStd->Precio,
                $productosStd->Categoria,
                $productosStd->RutaImg,
                $productosStd->CantidadStock,
                $productosStd->Borrado
            );
            array_push($arrayProductos, $producto);
        }
        return $arrayProductos;
    }

    public static function findById($id){
        $sql = "select * from Producto where Id  = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $productosStd = $result->fetchObject();
            $producto = new Producto(
                $productosStd->Id,
                $productosStd->Nombre,
                $productosStd->Descripcion,
                $productosStd->Precio,
                $productosStd->Categoria,
                $productosStd->RutaImg,
                $productosStd->CantidadStock,
                $productosStd->Borrado
            );
            return $producto;
        } else
            return null;
    }

    public static function insert($producto){
        $sql = "insert into Producto (Nombre,Descripcion,Precio,Categoria,RutaImg,CantidadStock,Borrado) values (?,?,?,?,?,?,?)";
        $parametros = array(
            $producto->Nombre,
            $producto->Descripcion,
            $producto->Precio,
            $producto->Categoria,
            $producto->RutaImg,
            $producto->CantidadStock,
            $producto->Borrado
        );
        return FactoryBd::realizarConsulta($sql, $parametros);
    }

    public static function update($producto){
        $sql = "update Producto set Nombre = ?, Descripcion = ?, Precio = ?, Categoria = ?, RutaImg = ? ,CnatidadStock = ? , Borrado = ? where id = ?";
        $parametros = array(
            $producto->Nombre,
            $producto->Descripcion,
            $producto->Precio,
            $producto->Categoria,
            $producto->RutaImg,
            $producto->CantidadStock,
            $producto->Borrado
        );
        return FactoryBd::realizarConsulta($sql, $parametros);
    }

    public static function delete($id){
        $sql = "delete from Producto where id = ?";
        $parametros = array($id);
        return FactoryBd::realizarConsulta($sql, $parametros);
    }









}

    


?>