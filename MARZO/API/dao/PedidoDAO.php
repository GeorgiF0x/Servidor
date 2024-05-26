<?php

require_once("./modelo/Pedido.php");
require_once("./dao/factoryBD.php");

class PedidoDAO{

    public static function findAll() {
        $sql = "SELECT * FROM Pedido";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() > 0) {
            $pedidos = $result->fetchAll(PDO::FETCH_ASSOC);
            return $pedidos;
        } else {
            return null;
        }
    }

    public static function findById($id) {
        $sql = "SELECT * FROM Pedido WHERE Id = ?";
        $parametros = array($id);
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $pedido = $result->fetch(PDO::FETCH_ASSOC);
            return $pedido;
        } else {
            return null;
        }
    }

    public static function insert($pedido) {
        $sql = "INSERT INTO Pedido (Fecha, Direccion, PagoTotal, Borrado) VALUES (?, ?, ?, ?)";
        $parametros = array(
            $pedido->Fecha,
            $pedido->Direccion,
            $pedido->PagoTotal,
            $pedido->Borrado
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function update($pedido) {
        $sql = "UPDATE Pedido SET Fecha = ?, Direccion = ?, PagoTotal = ?, Borrado = ? WHERE Id = ?";
        $parametros = array(
            $pedido->Fecha,
            $pedido->Direccion,
            $pedido->PagoTotal,
            $pedido->Borrado,
            $pedido->Id
        );
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function delete($id) {
        $sql = "DELETE FROM Pedido WHERE Id = ?";
        $parametros = array($id);
        return FactoryBd::realizaConsulta($sql, $parametros);
    }

    public static function findLastRecord() {
        $sql = "SELECT * FROM Pedido ORDER BY Id DESC LIMIT 1";
        $parametros = array();
        $result = FactoryBd::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $pedido = $result->fetch(PDO::FETCH_ASSOC);
            return $pedido;
        } else {
            return null;
        }
    }
    
}
    





    


?>