<?php

require("./modelo/User.php");
require_once("./dao/factoryBD.php");

class UserDAO{




    public static function findByEmail($id){
        $sql = "SELECT * FROM Usuarios WHERE user = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public static function findLast(){
        $sql = "SELECT * FROM Usuarios ORDER BY id DESC LIMIT 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
  

    public static function update($usuario){
        $sql="UPDATE Usuarios SET user = ?, token = ?, caduca = ? WHERE id = ?";
        $parametros = array($usuario->user
        , $usuario->token,$usuario->caduca ,$usuario->id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }


    public static function insert($usuario){
       $sql="INSERT INTO Usuarios (user, token,caduca) VALUES (?,?,?)";
       $parametros = array($usuario->user, $usuario->token,$usuario->caduca);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0){
            return true;
        }
    }


    public static function findbyFiltros($filtros){
        
        $num = count($filtros);
        $parametros = array();
        $sql = "SELECT * FROM  Usuarios WHERE ";
   
        foreach ($filtros as $key => $value) {
                $sql .= $key ." = ? ";
                array_push($parametros,$value);
            

            if($num == 2){
                $num--;
                $sql .= ' and ';
            }
        
        }

        $result = FactoryBD::realizaConsulta($sql,$parametros);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }






}

    


?>