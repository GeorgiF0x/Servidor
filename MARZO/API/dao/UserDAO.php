<?php

require("./modelo/Usuario.php");
require_once("./dao/factoryBD.php");

class UserDAO{


    public static function findById($id){
        $sql = "select * from Usuario where Id  = ?";
        $parametros = array($id);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $userStd = $result->fetchObject();
            $usuario = new Usuario(
                $usuarioStd->Id,
                $usuarioStd->nombre,
                $usuarioStd->Contraseña,
                $usuarioStd->Email,
                $usuarioStd->FechaNacimiento,
                $usuarioStd->IdRol,
                $usuarioStd->Borrado
            );
            return $usuario;
        } else
            return null;
    }


    public static function validarUser($nombre,$contraseña){
        $sql = "select * from Usuario where Nombre = ? and Contraseña = ?";
        $parametros = array($nombre,$contraseña);
        $result = FactoryBd::realizarConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new Usuario(
                $usuarioStd->Id,
                $usuarioStd->nombre,
                $usuarioStd->Contraseña,
                $usuarioStd->Email,
                $usuarioStd->FechaNacimiento,
                $usuarioStd->IdRol,
                $usuarioStd->Borrado
            );
            return $usuario;
        } else
            return null;
    }

    public static function insert($usuario){
        $sql = "insert into Usuario (Nombre,Contraseña,Email,FechaNacimiento,IdRol,Borrado) values (?,?,?,?,?,?)";
        $parametros = array(
            $usuario->Nombre,
            $usuario->Contraseña,
            $usuario->Email,
            $usuario->FechaNacimiento,
            $usuario->IdRol,
            $usuario->Borrado
        );
        return FactoryBd::realizarConsulta($sql, $parametros);
    }

    public static function update($usuario){
        $sql = "update Usuario set Nombre = ?, Contraseña = ?, Email = ?, FechaNacimiento = ?, IdRol = ? ,Borrado = ?  where Id = ?";
        $parametros = array(
            $usuario->Nombre,
            $usuario->Contraseña,
            $usuario->Email,
            $usuario->FechaNacimiento,
            $usuario->IdRol,
            $usuario->Borrado
        );
        return FactoryBd::realizarConsulta($sql, $parametros);
    }

    public static function delete($id){
        $sql = "delete from Usuario where Id = ?";
        $parametros = array($id);
        return FactoryBd::realizarConsulta($sql, $parametros);
    }








}

    


?>