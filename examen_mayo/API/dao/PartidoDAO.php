<?php

require("./modelo/Partido.php");
require_once("./dao/factoryBD.php");

class PartidoDAO{


    public static function findAll() {
        $sql = "select * from partido";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql,$parametros);
        if ($result->rowCount() > 0) {
            $usuarioStd = $result->fetchAll(PDO::FETCH_ASSOC); 
            return $usuarioStd; 
        } else {
            return null; 
        }
    }
    public static function findById($id){
        $sql = "select * from partido where id  = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $productoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoStd;
        } else
            return null;
    }
    public static function findByUserId($idjug1,$idjug2){
        $sql = "select * from partido where jug1 = ? and jug2 = ?";
        $parametros = array($idjug1,$idjug2);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $productoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoStd;
        } else
            return null;
    }
    public static function findByjugador($idjug1){
        $sql = "select * from partido where jug1 = ? order by fecha desc";
        $parametros = array($idjug1);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $productoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $productoStd;
        } else
            return null;
    }
    public static function insert($partido){
        $sql = "insert into partido (jug1,jug2,fecha,resultado) values (?,?,?,?)";
        $parametros = array(
            $partido->jug1,
            $partido->jug2,
            $partido->fecha,
            $partido->resultado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function update($partido){
        $sql = "update partido set jug1 = ?, jug2 = ?, fecha = ?, resultado = ? where id = ?";
        $parametros = array(
            $partido->jug1,
            $partido->jug2,
            $partido->fecha,
            $partido->resultado,
            $partido->id
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }
    
    public static function delete($id){
        $sql = "delete from partido where id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }









}

    


?>