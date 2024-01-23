<?php

class Cita {
    private $Id;
    private $Especialista;
    private $motivo;
    private $fecha;
    private $paciente;
    private $Activo;

    function __construct($Id,$Especialista,$motivo,$fecha, $paciente,$Activo=true){
        $this->Id = $Id;
        $this->Especialista = $Especialista;
        $this->motivo = $motivo;
        $this->fecha = $fecha;
        $this->paciente = $paciente;
        $this->Activo = $Activo;
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