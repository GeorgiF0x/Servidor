<?php

class UserDAO{
    public static function findAll(){
        $sql = "select * from Usuario";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        $array_usuarios = array();
        while($usuarioStd  = $result->fetchObject()){
            $usuario = new User($usuarioStd->Id,
                        $usuarioStd->Nombre,
                        $usuarioStd->Contraseña,
                        $usuarioStd->Email,
                        $usuarioStd->FechaNacimiento,
                        $usuarioStd->Perfil,
                        $usuarioStd->Borrado);
            array_push($array_usuarios,$usuario);
        }

        //return array con todos los User
        return $array_usuarios;
    }

    public static function findById($id){
        $sql = "select * from Usuario where Id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $usuarioStd  = $result->fetchObject();
            $usuario = new User($usuarioStd->Id,
                            $usuarioStd->Nombre,
                            $usuarioStd->Contraseña,
                            $usuarioStd->Email,
                            $usuarioStd->FechaNacimiento,
                            $usuarioStd->Perfil,
                            $usuarioStd->Borrado);
            return $usuario;
        }
        //return 1 objeto usuario
        else    
            return null;
    }

    public static function insert($usuario){
        $sql = "insert into Usuario (Id,Nombre,Contraseña,Email,
         FechaNacimiento,Perfil,Borrado) values (?,?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array($usuario->Id,
        $usuario->Nombre,
        $usuario->Contraseña,
        $usuario->Email, 
        $usuario->FechaNacimiento,
        $usuario->Perfil,
        $usuario->Borrado);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return true;
    }
    

    public static function update($usuario){
        $sql = "UPDATE Usuario SET
                Nombre = ?, 
                Email = ?, 
                FechaNacimiento = ?, 
                Perfil = ?, 
                Borrado = ?
                WHERE Id = ?";
        $parametros = array(
            $usuario->Nombre, 
            $usuario->Email,
            $usuario->FechaNacimiento, // Corrección de 'FechaNacimient' a 'FechaNacimiento'
            $usuario->Perfil,
            $usuario->Borrado,
            $usuario->Id
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return true;
        }
        return false;
    }
    

    public static function cambioContraseña($usuario) {
        $sql = "UPDATE Usuario SET Password = ?, Nombre = ?, Email = ?, FechaNacimiento = ?, Perfil = ?, Borrado = ? WHERE Id = ?";
    
        $parametros = array(
            $usuario->Password,
            $usuario->Nombre,
            $usuario->Email,
            $usuario->FechaNacimiento,
            $usuario->Perfil,
            $usuario->Borrado,
            $usuario->Id 
        );
    
        $result = FactoryBD::realizaConsulta($sql, $parametros);
    
        if ($result->rowCount() > 0) {
            return true; // Cambio de contraseña exitoso
        } else {
            return false; // No se realizó ningún cambio (usuario no encontrado)
        }
    }
    
    

    public static function delete($usuario){
        $sql = "update Usuario set Borrado = 1
        where Id = ?";
        //insertar todos los atributos
        $parametros = array($usuario->Id);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function activar($usuario){
        $sql = "update Usuario set Borrado = 0
        where Id = ?";
        //insertar todos los atributos
        $parametros = array($usuario->Id);        
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
            $usuarioStd  = $result->fetchObject();
            $usuario = new User($usuarioStd->Id,
                            $usuarioStd->Contraseña,
                            $usuarioStd->Email,
                            $usuarioStd->FechaNacimiento,
                            $usuarioStd->Perfil,
                            $usuarioStd->Borrado);
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
            $usuarioStd  = $result->fetchObject();
            $usuario = new User($usuarioStd->Id,
                            $usuarioStd->Contraseña,
                            $usuarioStd->Email,
                            $usuarioStd->FechaNacimiento,
                            $usuarioStd->Perfil,
                            $usuarioStd->Borrado);
            return $usuario;
        }
        //return 1 objeto usuario
        else    
            return null;
    }
}