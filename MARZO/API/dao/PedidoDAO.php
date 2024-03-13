<?php

require("./modelo/Pedido.php");
require("./modelo/Producto.php");
require("./modelo/DetallePedido.php");
require_once("./dao/factoryBD.php");

class PedidoDAO{

    public static function findAll(){
        $sql = "select * from Pedido";
        $parametros = array();
        $result = FactoryBd::realizarConsulta($sql,$parametros);
        $arrayPedidos = array();
        while ($pedidoStd = $result->fetchObject()) {
            $pedido = new Pedido(
                $pedidoStd->Id,
                $pedidoStd->Fecha,
                $pedidoStd->Direccion,
                $pedidoStd->PagoTotal,
                $pedidoStd->Borrado,
                $pedidoStd->contrasena
            );
            array_push($arrayPedidos, $pedido);
        }
        return $arrayPedidos;
    }

    public static function insert($pedido,$detalle){
        $sql = "insert into Pedido (Fecha,Direccion,PagoTotal,Borrado) values (?,?,?,?)";
        $sql_2 = "insert into DetallePedido (IdPedido,IdProducto,Cantidad,PrecioUnidad,Total,Borrado) values (?,?,?,?,?,?)";
        $parametrosPedido = array(
            $pedido->Fecha,
            $pedido->Direccion,
            $pedido->PagoTotal,
            $pedido->Borrado
        );
        $parametrosDetalle= array(
            $pedido->Id,
            $producto->Id,
            $detalle->cantidad,

        );
        return FactoryBd::realizarConsulta($sql, $parametrosPedido);
    }


}

    


?>