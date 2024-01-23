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
            array_push($array_productos,$usuario);
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
            $usuario = new User($productoStd->Codigo,
                            $productoStd->Nombre,
                            $productoStd->Descripcion,
                            $productoStd->CantidadStock,
                            $productoStd->Precio,
                            $productoStd->Borrado);
            return $usuario;
        }
        //return 1 objeto usuario
        else    
            return null;
    }

    public static function insert($usuario){
        $sql = "insert into Usuario (Id,Nombre,Contraseña,Email,
         FechaNacimiento,Borrado) values (?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array($usuario->Id,
        sha1($usuario->Contraseña),
        $usuario->Email, 
        $usuario->FechaNacimiento,
        $usuario->Borrado);
    
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }

    public static function update($usuario){
        $sql = "update Usuario set
        Nombre= ?, Email = ? , 
        FechaNacimiento = ? , Perfil = ?,
        Borrado = ?
        where Id = ?";
        //insertar todos los atributos
        $parametros = array(
        $usuario->Nombre, 
        $usuario->Contraseña,
        $usuario->Email,
        $usuario->FechaNacimiento,
        $usuario->Id);
        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }
    public static function cambioContraseña($usuario){
        $sql = "update Usuario set Contraseña = ?,
        Nombre = ?, Email = ? , FechaNacimiento = ? , Borrado = ?
        where Id = ?";
        //insertar todos los atributos
        $parametros = array(
        sha1($usuario->Contraseña),
        $usuario->Nombre, 
        $usuario->Email,
        $usuario->FechaNacimiento,
        $usuario->Perfil,
        $usuario->Borado);
        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function delete($usuario){
        $sql = "update Usuario set Borrado = true
        where Id = ?";
        //insertar todos los atributos
        $parametros = array($usuario->codUsuario);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function activar($usuario){
        $sql = "update Usuario set Borrado = false
        where Id = ?";
        //insertar todos los atributos
        $parametros = array($usuario->codUsuario);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }
    //findByDescUsuario
    public static function buscarPorNombre($nombre){
        $sql = "select * from Usuario where Nombre like ?";
        $nombre = '%'.$nombre.'%';
        $parametros = array($nombre);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $productoStd  = $result->fetchObject();
            $usuario = new User($productoStd->Id,
                            $productoStd->Contraseña,
                            $productoStd->Email,
                            $productoStd->FechaNacimiento,
                            $productoStd->Perfil,
                            $productoStd->Borrado);
            return $usuario;
        }
        //return 1 objeto usuario
        else    
            return null;
    }

    public static function validarUser($nombre,$pass){
        $sql = "select * from Usuario where 
        Nombre = ? and Contraseña = ? and Borrado = false ";
        $pass = sha1($pass);
        $parametros = array($nombre,$pass);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $productoStd  = $result->fetchObject();
            $usuario = new User($productoStd->Id,
                            $productoStd->Contraseña,
                            $productoStd->Email,
                            $productoStd->FechaNacimiento,
                            $productoStd->Perfil,
                            $productoStd->Borrado);
            return $usuario;
        }
        //return 1 objeto usuario
        else    
            return null;
    }
}