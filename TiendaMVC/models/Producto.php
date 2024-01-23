<?php

class Producto {
    private $Codigo;
    private $Nombre;
    private $Descripcion;
    private $CantidadStock;
    private $Precio;
    private $Imagen;

    function __construct($Codigo,$Nombre,$Descripcion,$CantidadStock, $Precio,$Imagen){
        $this->Codigo = $Codigo;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->CantidadStock = $CantidadStock;
        $this->Precio = $Precio;
        $this->Imagen = $Imagen;
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