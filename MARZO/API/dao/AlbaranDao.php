<?php

require("./modelo/Albaran.php");
require_once("./dao/factoryBD.php");

class AlbaranDAO{


    public static function findAll() {
        $sql = "SELECT * FROM Albaran";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $albaranStd = $result->fetchAll(PDO::FETCH_ASSOC); 
            return $albaranStd; 
        } else {
            return null; 
        }
    }

    public static function findById($id) {
        $sql = "SELECT * FROM Albaran WHERE Id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $albaranStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $albaranStd;
        } else {
            return null;
        }
    }

    public static function insert($albaran) {
        $sql = "INSERT INTO Albaran (Fecha, IdUsuario, Borrado) VALUES (?, ?, ?)";
        $parametros = array(
            $albaran->Fecha,
            $albaran->IdUsuario,
            $albaran->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function findLast() {
        $sql = "SELECT * FROM Albaran ORDER BY Id DESC LIMIT 1";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $albaranStd = $result->fetch(PDO::FETCH_ASSOC);
            return $albaranStd;
        } else {
            return null;
        }
    }

    public static function update($albaran) {
        $sql = "UPDATE Albaran SET Fecha = ?, IdUsuario = ?, Borrado = ? WHERE Id = ?";
        $parametros = array(
            $albaran->Fecha,
            $albaran->IdUsuario,
            $albaran->Borrado,
            $albaran->Id
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function delete($id) {
        $sql = "DELETE FROM Albaran WHERE Id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }
}


?>