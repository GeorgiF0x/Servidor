<?php

class PedidoCompra {
    private $Id;
    private $UsuarioID;
    private $FechaCompra;
    private $CodProducto;
    private $Cantidad;
    private $PrecioTotal;

    function __construct($Id, $UsuarioID,$FechaCompra = null,$CodProducto, $Cantidad, $PrecioTotal) {
        $this->Id = $Id;
        $this->UsuarioID = $UsuarioID;
        $this->FechaCompra = $FechaCompra; 
        $this->CodProducto = $CodProducto;
        $this->Cantidad = $Cantidad;
        $this->PrecioTotal = $PrecioTotal;
    }


    public function __get($att){
        if(property_exists(__CLASS__,$att))
            return $this->$att;
   }

   public function __set($att,$val){
        if(property_exists(__CLASS__,$att))
            $this->$att = $val;
        else    
            echo "No existe el att";
   }

}
?>