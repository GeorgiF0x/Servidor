<?php

class User {
    private $Id;
    private $Nombre;
    private $Contraseña;
    private $Email;
    private $FechaNacimiento;
    private $Perfil;
    private $Borrado;

    function __construct($Id,$Nombre,$Contraseña,$Email,$FechaNacimiento, $Perfil = 'Cliente',$Borrado=0){
        $this->Id = $Id;
        $this->Nombre=$Nombre;
        $this->Contraseña = $Contraseña;
        $this->Email = $Email;
        $this->FechaNacimiento = date('Y-m-d', strtotime($FechaNacimiento));
        $this->Perfil = $Perfil;
        $this->Borrado = $Borrado;
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