<?
    class Empresa
    {
        private $cif;
        private $nombre;
        private $localidad;

        static function saluda(){
            
        }
        //constructor
        function __construct($cif,$nombre,$localidad){
            $this->$cif=$cif;
            $this->$nombre=$nombre;
            $this->$localidad=$localidad;
        }
        //getter y setters
       function getCif(){
        return $this->cif;
       }
       function getNombre(){
        return $this->nombre;
       }
       function getLocalidad(){
        return $this->localidad;
       }

       function setCif($cif){
        return $this->cif=$cif;
       }
       function setNombre($nombre){
        return $this->nombre=$nombre;
       }
       function setLocalidad($localidad){
        return $this->localidad=$localidad;
       }
    }