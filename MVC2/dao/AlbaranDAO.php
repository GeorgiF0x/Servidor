<?php

class AlbaranDAO{
    public static function findAll() {
        $sql = "SELECT * FROM Albaran";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
    
        $array_albaranes = array();
        while ($albaranStd = $result->fetchObject()) {

            $fechaAlbaran = new DateTime($albaranStd->FechaAlbaran);
    
            $albaran = new Albaran(
                $albaranStd->Id,
                $fechaAlbaran,
                $albaranStd->CodProducto,
                $albaranStd->Cantidad,
                $albaranStd->UsuarioId,
                $albaranStd->Accion
            );
            array_push($array_albaranes, $albaran);
        }
    
        return $array_albaranes;
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

    public static function crearAlbaran($albaran) {
        $sql = "INSERT INTO Albaran (CodProducto, Cantidad, UsuarioId, Accion) VALUES (?, ?, ?, ?)";
        
        $parametros = array(
            $albaran->CodProducto,
            $albaran->Cantidad,
            $albaran->UsuarioId,
            $albaran->Accion
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        return true;
    }

    
    

    //pasar la fecha con un input date
    public static function buscarAlbaranPorFecha($fecha) {
        $sql = "SELECT * FROM Albaran WHERE DATE(FechaAlbaran) = ?";
        
        $parametros = array($fecha);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
    
        if ($result->rowCount() == 1) {
            
            $albaranStd = $result->fetchObject();
            $albaran = new Albaran(
                $albaranStd->Id,
                $albaranStd->FechaAlbaran,
                $albaranStd->CodProducto,
                $albaranStd->Cantidad,
                $albaranStd->UsuarioId,
                $albaranStd->Accion
            );
            return $albaran;
        } else {
            return null;
        }
    }
}