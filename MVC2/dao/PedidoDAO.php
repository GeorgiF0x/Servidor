<?php

class PedidoDAO{
    public static function findAll() {
        $sql = "SELECT * FROM PedidoCompra";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        $array_pedidos = array();
        while ($pedidoStd = $result->fetchObject()) {
            
            $fechaCompra = new DateTime($pedidoStd->FechaCompra);

            $pedido = new PedidoCompra(
                $pedidoStd->Id,
                $pedidoStd->UsuarioID,
                $fechaCompra, 
                $pedidoStd->CodProducto,
                $pedidoStd->Cantidad,
                $pedidoStd->PrecioTotal
            );
            array_push($array_pedidos, $pedido);
        }
    }

    public static function findById($id) {
        $sql = "SELECT * FROM PedidoCompra WHERE Id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if ($result->rowCount() == 1) {
            $pedidoStd = $result->fetchObject();

            $fechaCompra = new DateTime($pedidoStd->FechaCompra);
            $pedido = new PedidoCompra(
                $pedidoStd->Id,
                $pedidoStd->UsuarioID,
                $fechaCompra, 
                $pedidoStd->CodProducto,
                $pedidoStd->Cantidad,
                $pedidoStd->PrecioTotal

            );
            return $pedido;
        } else {
            return null;
        }
    }

    public static function crearPedido($pedido) {
        $sql = "INSERT INTO PedidoCompra (UsuarioID, CodProducto, Cantidad, PrecioTotal) VALUES (?, ?, ?, ?)";
        
        $parametros = array(
            $pedido->UsuarioID,
            $pedido->CodProducto,
            $pedido->Cantidad,
            $pedido->PrecioTotal
        );
    
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        return true;
    }
    
    

    //pasar la fecha con un input date
    public static function buscarPorFecha($fecha) {
        $sql = "SELECT * FROM PedidoCompra WHERE DATE(FechaCompra) = ?";
        
        $parametros = array($fecha);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
    
        if ($result->rowCount() == 1) {
            $pedidoStd = $result->fetchObject();
            $pedido = new PedidoCompra(
                $pedidoStd->Id,
                $pedidoStd->UsuarioID,
                $pedidoStd->FechaCompra,
                $pedidoStd->CodProducto,
                $pedidoStd->Cantidad,
                $pedidoStd->PrecioTotal
            );
            return $pedido;
        } else {
            return null;
        }
    }
    
}