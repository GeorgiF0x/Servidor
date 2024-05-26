<?php

require_once("./modelo/DetallePedido.php");
require_once("./dao/factoryBD.php");

class DetallePedidoDAO {

    public static function findAll() {
        $sql = "SELECT * FROM DetallePedido";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $detallePedidoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $detallePedidoStd; 
        } else {
            return null; 
        }
    }

    public static function findById($id) {
        $sql = "SELECT * FROM DetallePedido WHERE Id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $detallePedidoStd = $result->fetch(PDO::FETCH_ASSOC);
            return $detallePedidoStd;
        } else {
            return null;
        }
    }

    public static function insert($detallePedido) {
        $sql = "INSERT INTO DetallePedido (IdPedido, IdProducto, Cantidad, PrecioUnidad, Total, Borrado) VALUES (?, ?, ?, ?, ?, ?)";
        $parametros = array(
            $detallePedido->IdPedido,
            $detallePedido->IdProducto,
            $detallePedido->Cantidad,
            $detallePedido->PrecioUnidad,
            $detallePedido->Total,
            $detallePedido->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function update($detallePedido) {
        $sql = "UPDATE DetallePedido SET IdPedido = ?, IdProducto = ?, Cantidad = ?, PrecioUnidad = ?, Total = ?, Borrado = ? WHERE Id = ?";
        $parametros = array(
            $detallePedido->IdPedido,
            $detallePedido->IdProducto,
            $detallePedido->Cantidad,
            $detallePedido->PrecioUnidad,
            $detallePedido->Total,
            $detallePedido->Borrado,
            $detallePedido->Id
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function delete($id) {
        $sql = "DELETE FROM DetallePedido WHERE Id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function findByIdProducto($idProducto) {
        $sql = "SELECT * FROM DetallePedido WHERE IdProducto = ?";
        $parametros = array($idProducto);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $detallePedidoStd = $result->fetchAll(PDO::FETCH_ASSOC);
            return $detallePedidoStd;
        } else {
            return null;
        }
    }
}

?>
