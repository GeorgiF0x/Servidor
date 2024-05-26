<?php

require("./modelo/DetalleAlbaran.php");
require_once("./dao/factoryBD.php");

class DetalleAlbaranDAO{

    public static function findAll() {
        $sql = "SELECT * FROM DetalleAlbaran";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $detalleAlbaranStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $detalleAlbaranStd; 
        } else {
            return null; 
        }
    }

    public static function findById($id) {
        $sql = "SELECT * FROM DetalleAlbaran WHERE Id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $detalleAlbaranStd = $result->fetch(PDO::FETCH_ASSOC);
            return $detalleAlbaranStd;
        } else {
            return null;
        }
    }

    public static function insert($detalleAlbaran) {
        $sql = "INSERT INTO DetalleAlbaran (IdAlbaran, IdProducto, Unidades, Borrado) VALUES (?, ?, ?, ?)";
        $parametros = array(
            $detalleAlbaran->IdAlbaran,
            $detalleAlbaran->IdProducto,
            $detalleAlbaran->Unidades,
            $detalleAlbaran->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function update($detalleAlbaran) {
        $sql = "UPDATE DetalleAlbaran SET IdAlbaran = ?, IdProducto = ?, Unidades = ?, Borrado = ? WHERE Id = ?";
        $parametros = array(
            $detalleAlbaran->IdAlbaran,
            $detalleAlbaran->IdProducto,
            $detalleAlbaran->Unidades,
            $detalleAlbaran->Borrado,
            $detalleAlbaran->Id
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function delete($id) {
        $sql = "DELETE FROM DetalleAlbaran WHERE Id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function findByIdProducto($idUsuario) {
        $sql = "SELECT * FROM DetalleAlbaran WHERE IdProducto = ?";
        $parametros = array($idUsuario);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $detalleAlbaranStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $detalleAlbaranStd;
        } else {
            return null;
        }
    }
    
    public static function findByAlbaranId($idAlbaran) {
        $sql = "SELECT * FROM DetalleAlbaran WHERE IdAlbaran = ?";
        $parametros = array($idAlbaran);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}

?>
