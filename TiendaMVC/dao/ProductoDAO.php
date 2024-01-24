<?php

class ProductoDAO{
    public static function findAll(){
        $sql = "select * from Producto";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        $array_productos = array();
        while($productoStd  = $result->fetchObject()){
            $producto = new User($productoStd->Codigo,
                        $productoStd->Nombre,
                        $productoStd->Descripcion,
                        $productoStd->CantidadStock,
                        $productoStd->Precio,
                        $productoStd->Borrado);
            array_push($array_productos,$producto );
        }
        //return array con todos los User
        return $array_productos;
    }

    public static function findById($id){
        $sql = "select * from Producto where Codigo = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $productoStd  = $result->fetchObject();
            $producto = new User($productoStd->Codigo,
                            $productoStd->Nombre,
                            $productoStd->Descripcion,
                            $productoStd->CantidadStock,
                            $productoStd->Precio,
                            $productoStd->Borrado);
            return $producto;
        }
        //return 1 objeto producto
        else    
            return null;
    }

    public static function insert($producto){
        $sql = "insert into producto (Codigo,Nombre,Descripcion,CantidadStock,
         Precio,Imagen,Borrado) values (?,?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array($producto->Codigo,
        $producto->Nombre,
        $producto->Descripcion,
        $producto->CantidadStock,
        $producto->Precio,
        $producto->Borrado);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($producto){
        $sql = "update Producto set
        Nombre= ?, Descripcion = ? , 
        cantidadStock = ? , Precio = ?,
        Imagen = ? ,Borrado = ?,
        where Id = ?";
        //insertar todos los atributos
        $parametros = array(
        $producto->Nombre,
        $producto->Descripcion,
        $producto->CantidadStock,
        $producto->Precio,
        $producto->Borrado);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }


    public static function delete($producto){
        $sql = "update Producto set Borrado = true
        where Codigo = ?";
        //insertar todos los atributos
        $parametros = array($producto->codproducto);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function activar($producto){
        $sql = "update Producto set Borrado = false
        where Codigo = ?";
        //insertar todos los atributos
        $parametros = array($producto->codproducto);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }
    //findByDescproducto
    public static function buscarPorNombre($nombre){
        $sql = "select * from Producto where Nombre like ?";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $productoStd  = $result->fetchObject();
            $producto = new User($productoStd->Codigo,
                            $productoStd->Nombre,
                            $productoStd->Descripcion,
                            $productoStd->CantidadStock,
                            $productoStd->Precio,
                            $productoStd->Borrado);
                     return $producto;
        }
        //return 1 objeto producto
        else    
            return null;
    }
    
}