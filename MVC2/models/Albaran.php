<?php

class Albaran {
    private $Id;
    private $FechaAlbaran;
    private $CodProducto;
    private $Cantidad;
    private $UsuarioId;
    private $Accion;

    function __construct($Id, $FechaAlbaran = null, $CodProducto, $Cantidad, $UsuarioId, $Accion) {
        $this->Id = $Id;
        $this->FechaAlbaran = $FechaAlbaran;
        $this->CodProducto = $CodProducto;
        $this->Cantidad = $Cantidad;
        $this->UsuarioId = $UsuarioId;
        $this->Accion = $Accion;
    }

    public function __get($att) {
        if (property_exists(__CLASS__, $att))
            return $this->$att;
    }

    public function __set($att, $val) {
        if (property_exists(__CLASS__, $att))
            $this->$att = $val;
        else
            echo "No existe el att";
    }
}

?>
