<?php

class Instituto {
    private $ID;
    private $Nombre;
    private $Localidad;
    private $Telefono;


    function __construct($ID,$Nombre,$Localidad,$Telefono){
        $this->ID= $ID;
        $this->Nombre = $Nombre;
        $this->Localidad = $Localidad;
        $this->Telefono = $Telefono;
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