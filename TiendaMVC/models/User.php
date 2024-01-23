<?php

class User {
    private $Id;
    private $Contraseña;
    private $Email;
    private $FechaNaciemiento;
    private $Perfil;
    private $Borrado;

    function __construct($Id,$Contraseña,$Email,$FechaNaciemiento, $Perfil = 'usuario',$Borrado=false){
        $this->Id = $Id;
        $this->Contraseña = $Contraseña;
        $this->Email = $Email;
        $this->FechaNaciemiento = $FechaNaciemiento;
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